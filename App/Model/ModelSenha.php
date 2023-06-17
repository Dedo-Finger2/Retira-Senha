<?php

namespace App\Model; // "Namespace da classe (localização dela)" - Greg
use CoffeeCode\DataLayer\DataLayer; // "Chamando a classe Datalayer para servir como herança para a classe Senha" - Greg

class ModelSenha extends DataLayer // "Herdando funcionalidades da classe Datalayer" - Greg
{
     /**
     * Construtor base, toda classe vai ter um igual
     * 
     * [ Estrutura ]
     * parent::__construct("nome_tabela", ["campos", "notNulls"], "primary_key_da_tabela", possui_time_stamp? True ou falso);
     */
    public function __construct()
    {
        parent::__construct("", [""], "", false);
    }

    /**
     * Esse método será responsável por retornar uma lista com as senhas filtradas,
     * as senhas filtradas vão depender do que o usuário escolheu na tela de filtragem
     * de senhas.
     * @param string $nome_curso - Nome do curso selecionado pelo usuário
     * @param string $turno - Turno escolhido pelo usuário
     * @param string $faixa_etaria - Faixa etária escohida pelo usuário
     * @param array $dias_aula - Dias de aula marcados pelo usuário
     * @return array - Lista com as senhas filtradas
     */
    public function listFilteredPasswords($nome_curso, $turno, $faixa_etaria, $dias_aula): array
    {
        # Código aqui...
    }

    /**
     * Esse método será responsável por retornar uma lista com as senhas que o usuário
     * possui associado a seu nome.
     * @param int $idUsuario - ID do usuário
     * @return array - Lista de senhas que estão associadas com o ID informado
     */
    public function listUserPasswords($idUsuario): array
    {
        # Código aqui...
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
     */
    public function returnPassword($idUsuario, $idSenha): array
    {
        # Código aqui...
    }
    
    /**
     * Esse método será responsável por permitir o usuário pegar uma senha para si,
     * esse método vai garantir o usuário seja dono da senha que quis pegar, podemos mudar
     * a SITUACAO da senha e também associar o ID do usuário a ela.
     * @param int $idUsuario - ID do usuário que está pegando a senha
     * @param int $idSenha - ID da senha que está sendo pega pelo usuário
     */
    public function claimPassword($idUsuario, $idSenha): void
    {
        # Código aqui...
    }

    /**
     * Esse método será responsável por mostrar detalhes da senha que o usuário gostaria
     * de ver, isso pode ser uma opção dentro de uma tabela, assim o usuário vai poder ver
     * informações mais detalhadas da senha como: turno, faixa etária, etc.
     * @param int $idSenha - ID da senha que terá seus dados revelados
     */
    public function showMorePasswordInfo($idSenha): void
    {
        # Código aqui...
    }

    /**
     * Esse método será responsável por mostrar a senha numa tela branca, isso vai possibilitar
     * o usuário imprimir a senha se quiser. Essa também seria uma opção presente
     * numa tabela. {TALVEZ SEJA DESCARTADO} 
     * @param int $idSenha - ID da senha que será impressa
     */
    public function printPassword($idSenha): void
    {
        # Código aqui...
    }
}
