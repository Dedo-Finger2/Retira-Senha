<?php

namespace App\Model; // "Namespace da classe (localização dela)" - Greg

use CoffeeCode\DataLayer\DataLayer; // "Chamando a classe Datalayer para servir como herança para a classe Senha" - Greg
use CoffeeCode\DataLayer\Connect;

class ModelSenha extends DataLayer // "Herdando funcionalidades da classe Datalayer" - Greg
{
    private $conn;

    /**
     * Construtor base, toda classe vai ter um igual
     * 
     * [ Estrutura ]
     * parent::__construct("nome_tabela", ["campos", "notNulls"], "primary_key_da_tabela", possui_time_stamp? True ou falso);
     */
    public function __construct()
    {
        parent::__construct("senha", [], "cod_senha", false);
        $this->conn = Connect::getInstance();
    }

    /**
     * Esse método será responsável por retornar uma lista com as senhas filtradas,
     * as senhas filtradas vão depender do que o usuário escolheu na tela de filtragem
     * de senhas.
     * @param string $turno - Turno escolhido pelo usuário
     * @param string $idade_minima - Idade mínima escolhida pelo usuário
     * @param string $idade_maxima - Idade máxima escolhida pelo usuário
     * @param array $dias_aula - Dias de aula marcados pelo usuário
     * @return array - Lista com as senhas filtradas
     */
    public function listFilteredPasswords($turno = null, $idade_minima = null, $idade_maxima = null, $dias_aula = null)
    {
        /**
         * Para cada dia selecionado criar uma query customizada que vai pegar o nome do Dia (SEGUNDA) e as 3 primeiras letras dele (SEG)
         * Se os dias de aula não forem nulos, ou seja, se o usuário escolher algum dia de semana, então fazer a query correspondente
         * 
         * A $clausulas_like guarda toda a verificação feita para cada dia selecionado, e então é feito um junção de cada validação em $clausulas_like separando elas com a palavra AND
         * dessa forma formando uma super verificação com todos os dias e seperando cada verificação com um AND para então ser usado na query.
         */
        if (!empty($dias_aula)) {
            $clausulas_like = array();
            foreach ($dias_aula as $dia) {
                $clausulas_like[] = "turma.dias_de_aula LIKE '%$dia%' OR turma.dias_de_aula LIKE '%" . substr($dia, 0, 3) . "%'";
            }
            $clausulas_where = implode(" AND ", $clausulas_like);

            /**
             * Nessa query são feitas todas as fitragens necessárias e requisitadas pelo usuário
             * na tela de filtragem de senhas. As fitragens são feitas com variáveis PHP
             * inseridas em clausulas WHERE e AND para verificar exatamente oq o usuário pediu
             * 
             * A diferença é que aqui seria se o usuário escolher um dia específico para ter aulas
             */
            $queryComDiasDeAula = $this->conn->query("SELECT 
            turma.nome_turma, 
            modulo.situacao_modulo,
            curso.nome_curso,
            turma.turno,
            turma.dias_de_aula,
            turma.nome_faixa_etaria as faixa_etaria,
            turma.qtd_aluno as quantidade_aluno,
            turma.idade_minima,
            turma.idade_maxima,
            senha.cod_senha,
            COUNT(senha.cod_turma) as total_senhas,
            GROUP_CONCAT(DISTINCT senha.autenticacao SEPARATOR ', ') as senhas
            FROM turma 
            INNER JOIN senha ON senha.cod_turma = turma.cod_turma
            INNER JOIN modulo ON modulo.cod_modulo = turma.cod_modulo
            INNER JOIN curso ON modulo.cod_curso = curso.cod_curso
            WHERE (senha.situacao = 'DISPONIVEL' OR senha.situacao != 'UTILIZADA')
            AND turma.cod_periodo_letivo = (SELECT MAX(cod_periodo_letivo) FROM periodo_letivo)
            AND modulo.situacao_modulo = 'ATIVO'
            AND turma.turno LIKE '%$turno%'
            AND turma.idade_minima >= $idade_minima
            AND turma.idade_maxima <= $idade_maxima
            AND ($clausulas_where)
            GROUP BY turma.nome_turma
            ");

            return $queryComDiasDeAula->fetchAll();
        } else {

            /**
             * Query sem os dias da semana selecionado
             * Nessa query são feitas todas as fitragens necessárias e requisitadas pelo usuário
             * na tela de filtragem de senhas. As fitragens são feitas com variáveis PHP
             * inseridas em clausulas WHERE e AND para verificar exatamente oq o usuário pediu
             */
            $querySemDiasDeAula = $this->conn->query("SELECT 
        turma.nome_turma, 
        modulo.situacao_modulo,
        curso.nome_curso,
        turma.turno,
        turma.dias_de_aula,
        turma.nome_faixa_etaria as faixa_etaria,
        turma.qtd_aluno as quantidade_aluno,
        turma.idade_minima,
        turma.idade_maxima,
        senha.cod_senha,
        COUNT(senha.cod_turma) as total_senhas,
        GROUP_CONCAT(DISTINCT senha.autenticacao SEPARATOR ', ') as senhas
        FROM turma 
        INNER JOIN senha ON senha.cod_turma = turma.cod_turma
        INNER JOIN modulo ON modulo.cod_modulo = turma.cod_modulo
        INNER JOIN curso ON modulo.cod_curso = curso.cod_curso
        WHERE (senha.situacao = 'DISPONIVEL' OR senha.situacao != 'UTILIZADA')
        AND turma.cod_periodo_letivo = (SELECT MAX(cod_periodo_letivo) FROM periodo_letivo)
        AND modulo.situacao_modulo = 'ATIVO'
        AND turma.turno LIKE '%$turno%'
        AND turma.idade_minima >= $idade_minima
        AND turma.idade_maxima <= $idade_maxima
        GROUP BY turma.nome_turma
        ");

            return $querySemDiasDeAula->fetchAll();
        }
    }

    /**
     * Esse método será responsável por retornar uma lista com as senhas que o usuário
     * possui associado a seu nome, isso vai ser obtido por meio da relação entre Cadastro e Senha
     * @param int $idUsuario - ID do usuário
     * @return array - Lista de senhas que estão associadas com o ID informado
     */
    public function listUserPasswords($idUsuario)
    {
        /**
         * Query que seleciona algumas informações das senhas filtrando apenas as senhas
         * que possuem um usuário atrelado a elas, isso pode se verificado com a FK que
         * criamos na tabela senha (cod_cadastro) que recebe o iD do usuário dono da senha
         */
        $senhasUsuario = $this->conn->query("SELECT 
        curso.nome_curso,
        senha.autenticacao,
        senha.validade,
        senha.cod_senha
        FROM senha 
        INNER JOIN turma ON turma.cod_turma = senha.cod_turma
        INNER JOIN modulo ON modulo.cod_modulo = turma.cod_modulo
        INNER JOIN curso ON modulo.cod_curso = curso.cod_curso
        WHERE senha.cod_cadastro = '$idUsuario'
        ");

        return $senhasUsuario->fetchAll(); // Retorna um array com todas as senhas do usuário
    }

    /**
     * Esse método será responsável por devolver uma senha ao sistema, isso será feito
     * usando dois campos importantes na tabela Senha: SITUACAO e COD_CADASTRO...
     * 
     * Se o cod_cadastro for nulo, então a situacao da senha deve ser DISPONÍVEL,
     * ou seja, se a senha não tiver nenhum usuário cadastrado com seu nome então ela
     * pode ser pega por outro usuário e assim sua situacao seria setada para UTILIZADA e
     * cod_cadastro teria o ID do usuário dono dessa senha.
     * @param int $idSenha - ID da senha que vai ser devolvida
     * @return ModelSenha
     */
    public function returnPassword($idSenha)
    {
        /**
         * Localizando a senha pelo ID dela e retornando ela como um array
         */
        $senhaDevolvida = (new ModelSenha())->find("cod_senha = '$idSenha'")->fetch();

        /**
         * Setando o valor da situacao da senha para DISPONIVEL e deixando nulo
         * o campo cod_cadastro (nossa FK que possui o ID do usuário dono da senha)
         * Dessa forma a senha vai sumir da tabela minhas senhas e vai aparecer como opção no sistema
         */
        $senhaDevolvida->situacao = "DISPONIVEL";
        $senhaDevolvida->cod_cadastro = null;

        $senhaDevolvida->save(); // Salvando mudanças no banco de dados

        //var_dump($senhaDevolvida);

        return $senhaDevolvida;
    }

    /**
     * Esse método será responsável por permitir o usuário pegar uma senha para si,
     * esse método vai garantir o usuário seja dono da senha que quis pegar, podemos mudar
     * a SITUACAO da senha e também associar o ID do usuário a ela.
     * @param int $idUsuario - ID do usuário que está pegando a senha
     * @param string $nomeSenha - Autenticacao da senha escolhida
     * @return ModelSenha
     */
    public function claimPassword($idUsuario, $nomeSenha)
    {
        /**
         * Encontra a senha pelo nome dela (autenticacao)
         */
        $senhaSelecionada = (new ModelSenha())->find("autenticacao = '$nomeSenha'")->fetch();

        /**
         * Então é atribuido à coluna cod_cadastro dela (um fk feito por nós) o id do usuário
         * que pegou a senha
         * e também a SITUACAO da senha é colocada como UTILIZADA
         */
        $senhaSelecionada->cod_cadastro = $idUsuario;
        $senhaSelecionada->situacao = 'UTILIZADA';

        $senhaSelecionada->save(); // Salvando modificações no banco

        return $senhaSelecionada;
    }

    /**
     * Esse método será responsável por mostrar detalhes da senha que o usuário gostaria
     * de ver, isso pode ser uma opção dentro de uma tabela, assim o usuário vai poder ver
     * informações mais detalhadas da senha como: turno, faixa etária, etc.
     * @param int $idSenha - ID da senha que terá seus dados revelados
     * @return ModelSenha
     */
    public function showMorePasswordInfo($idSenha)
    {
        # Código aqui...
    }

    /**
     * Esse método será responsável por mostrar a senha numa tela branca, isso vai possibilitar
     * o usuário imprimir a senha se quiser. Essa também seria uma opção presente
     * numa tabela. {TALVEZ SEJA DESCARTADO} 
     * @param int $idSenha - ID da senha que será impressa
     * @return ModelSenha
     */
    public function printPassword($idSenha)
    {
        # Código aqui...
    }
}