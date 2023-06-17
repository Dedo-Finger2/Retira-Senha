<?php

namespace App\Model; // "Namespace da classe (localização dela)" - Greg
use CoffeeCode\DataLayer\DataLayer; // "Chamando a classe Datalayer para servir como herança para a classe Cadastro" - Greg

class Cadastro extends DataLayer // "Herdando funcionalidades da classe Datalayer" - Greg
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
     * Esse método é responsável por registrar um novo usuário no sistema.
     * @param array $data - Um array que será recebido via POST de um formulário
     */
    public function registerUser($data): void
    {
        # Código aqui...
    }
    
    /**
     * Esse métdo é responsável por logar um usuário já cadastrado no sistema,
     * para isso pode ser feito validações aqui nesse classe.
     * @param array $data - Um array com as informações fornecidas pelo usuário
     */
    public function loginUser(): void
    {
        # Código aqui...
    }

    /**
     * Esse método é responsável por retornar a lista de usuários do sistema
     * @return array - Array com todos os usuários cadastrados no sistema
     */
    public function listAllUsers(): array
    {
        # Código aqui...
    }

    /**
     * Esse método é responsável por atualizar credencias de um usuário já cadastrado
     * no sistema.
     * @param array $newData - Novos dados do usuário
     * @param int $idUsuario - ID do usuário que vai ser editado
     */
    public function updateUser($newData, $idUsuario): void
    {
        # Código aqui...
    }

    /**
     * Esse método é responsável por deletar um usuário do sistema.
     * @param int $idUsuario - ID do usuário que vai ser deletado
     */
    public function deleteUser($idUsuario): void
    {
        # Código aqui...
    }
}

