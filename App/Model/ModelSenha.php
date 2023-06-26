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
     * @param string $nome_curso - Nome do curso selecionado pelo usuário
     * @param string $turno - Turno escolhido pelo usuário
     * @param string $idade_minima - Idade mínima escolhida pelo usuário
     * @param string $idade_maxima - Idade máxima escolhida pelo usuário
     * @param array $dias_aula - Dias de aula marcados pelo usuário
     * @return array - Lista com as senhas filtradas
     */
    public function listFilteredPasswords($nome_curso = null, $turno = null, $idade_minima = null, $idade_maxima = null, $dias_aula = null)
    {
        /**
         * Para cada dia selecionado criar uma query customizada que vai pegar o dia e as 3 primeiras letras dele
         * Se os dias de aula não forem nulos, ou seja, se o usuário escolher algum dia de semana, então fazer a query correspondente
         */
        if ($dias_aula) {
            $clausulas_like = array();
            foreach ($dias_aula as $dia) {
                $clausulas_like[] = "turma.dias_de_aula LIKE '%$dia%' OR turma.dias_de_aula LIKE '%" . substr($dia, 0, 3) . "%'";
            }
            $clausulas_where = implode(" OR ", $clausulas_like);

            $teste2 = $this->conn->query("SELECT 
            turma.nome_turma, 
            modulo.situacao_modulo,
            curso.nome_curso,
            turma.turno,
            turma.dias_de_aula,
            turma.nome_faixa_etaria as faixa_etaria,
            turma.qtd_aluno as quantidade_aluno,
            COUNT(senha.cod_turma) as total_senhas,
            GROUP_CONCAT(DISTINCT senha.autenticacao SEPARATOR ', ') as senhas
            FROM turma 
            INNER JOIN senha ON senha.cod_turma = turma.cod_turma
            INNER JOIN modulo ON modulo.cod_modulo = turma.cod_modulo
            INNER JOIN curso ON modulo.cod_curso = curso.cod_curso
            WHERE senha.situacao = 'DISPONIVEL' 
            AND turma.cod_periodo_letivo = '7'
            AND modulo.situacao_modulo = 'ATIVO'
            AND turma.turno LIKE '%$turno%'
            AND turma.idade_minima <= '%$idade_minima%' AND turma.idade_maxima >= '%$idade_maxima%'
            AND ($clausulas_where)
            GROUP BY turma.nome_turma
            ");
        }

        /**
         * Query sem os dias da semana selecionado
         */
        $teste2 = $this->conn->query("SELECT 
        turma.nome_turma, 
        modulo.situacao_modulo,
        curso.nome_curso,
        turma.turno,
        turma.dias_de_aula,
        turma.nome_faixa_etaria as faixa_etaria,
        turma.qtd_aluno as quantidade_aluno,
        turma.idade_minima,
        turma.idade_maxima,
        COUNT(senha.cod_turma) as total_senhas,
        GROUP_CONCAT(DISTINCT senha.autenticacao SEPARATOR ', ') as senhas
        FROM turma 
        INNER JOIN senha ON senha.cod_turma = turma.cod_turma
        INNER JOIN modulo ON modulo.cod_modulo = turma.cod_modulo
        INNER JOIN curso ON modulo.cod_curso = curso.cod_curso
        WHERE senha.situacao = 'DISPONIVEL' 
        AND turma.cod_periodo_letivo = '7'
        AND modulo.situacao_modulo = 'ATIVO'
        AND turma.turno LIKE '%$turno%'
        AND turma.idade_minima >= $idade_minima
        AND turma.idade_maxima <= $idade_maxima
        GROUP BY turma.nome_turma
        ");

        return $teste2->fetchAll();
    }

    /**
     * Esse método será responsável por retornar uma lista com as senhas que o usuário
     * possui associado a seu nome, isso vai ser obtido por meio da relação entre Cadastro e Senha
     * @param int $idUsuario - ID do usuário
     * @return array - Lista de senhas que estão associadas com o ID informado
     */
    public function listUserPasswords($idUsuario)
    {
        
    }

    /**
     * Esse método será responsável por devolver uma senha ao sistema, isso será feito
     * usando dois campos importantes na tabela Senha: SITUACAO e COD_CADASTRO...
     * 
     * Se o cod_cadastro for nulo, então a situacao da senha deve ser DISPONÍVEL,
     * ou seja, se a senha não tiver nenhum usuário cadastrado com seu nome então ela
     * pode ser pega por outro usuário e assim sua situacao seria setada para UTILIZADA e
     * cod_cadastro teria o ID do usuário dono dessa senha.
     * @param int $idUsuario - ID do usuário que quer devolver a senha
     * @param int $idSenha - ID da senha que vai ser devolvida
     * @return ModelSenha
     */
    public function returnPassword($idUsuario, $idSenha)
    {
        # Código aqui...
    }
    
    /**
     * Esse método será responsável por permitir o usuário pegar uma senha para si,
     * esse método vai garantir o usuário seja dono da senha que quis pegar, podemos mudar
     * a SITUACAO da senha e também associar o ID do usuário a ela.
     * @param int $idUsuario - ID do usuário que está pegando a senha
     * @param int $idSenha - ID da senha que está sendo pega pelo usuário
     * @return ModelSenha
     */
    public function claimPassword($idUsuario, $idSenha)
    {
        # Código aqui...
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
