<?php

namespace App\Model; // "Namespace da classe (localização dela)" - Greg
use CoffeeCode\DataLayer\DataLayer; // "Chamando a classe Datalayer para servir como herança para a classe Cadastro" - Greg

class ModelCadastro extends DataLayer // "Herdando funcionalidades da classe Datalayer" - Greg
{
    /**
     * Construtor base, toda classe vai ter um igual
     * 
     * [ Estrutura ]
     * parent::__construct("nome_tabela", ["campos", "notNulls"], "primary_key_da_tabela", possui_time_stamp? True ou falso);
     */
    public function __construct()
    {
        parent::__construct("cadastro", [], "cod_cadastro", false);
    }

    /**
     * Esse método é responsável por registrar um novo usuário no sistema, deve ser verificado se o usuário já existe
     * se já existir o método deve exibir uma mensagem ao usuário
     * @param string $nome - Nome do usuário
     * @param string $email - Email do usuário
     * @param string $senha - Senha do usuário
     * @param string $rg - RG do usuário
     */
    public function registerUser($nome, $email, $senha, $rg): ModelCadastro
    {
        /**
         * Atribuindo valores ás colunas da tabela Cadastro
         */
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->rg = $rg;

        return $this; // Retornando o que foi feito
    }
    
    /**
     * Esse métdo é responsável por logar um usuário já cadastrado no sistema,
     * para isso pode ser feito validações aqui nesse classe tentando ver se o RG da pessoa
     * está cadastrado no sistema, se sim, então cria-se uma sessão com o rg da pessoa
     * @param string $nome - Nome do usuário que está tentando logar
     * @param string $rg - RG do usuário que está tentando logar
     */
    public function loginUser($nome, $rg)
    {
        /**
         * Cria um novo objeto ModelCadastro
         * E usa o método herdado do DataLayer find()
         * o método tenta buscar no banco de dados o RG especificado, que nesse caso é o do usuário
         * fetch(true) retorna todos os resultados dentro de um array
         */
        $verifyRg = (new ModelCadastro())->find("rg = '{$rg}'")->fetch(true);
        $verifyNome = (new ModelCadastro())->find("nome = '{$nome}'")->fetch(true);

        /**
         * Se as consultas acima der certo, então o usuário tem o rg cadastrado e o nome bate com o rg!
         * Se sim então retorne TRUE
         */
        if ($verifyRg && $verifyNome) {
            return true;
        }
        
        /**
         * Se não, retorne FALSE
         */
        return false;
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
     * @param array $nome - Novo nome do usuário
     * @param string $email - Novo email do usuário
     * @param string $senha - Nova senha do usuário
     * @param string $rg - Novo RG do usuário
     * @param int $idUsuario - ID do usuário que vai ser editado
     */
    public function updateUser($nome, $email, $senha, $rg, $idUsuario): void
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

    /**
     * Esse método é responsável por deslogar o usuário do sistema, apenas isso
     */
    public function logOff(): ModelCadastro
    {
        /**
         * Inicia a sessão
         * pra então destruir ela kk
         * e acabou! :D
         */
        session_start();
        session_destroy();
        return $this;
    }
}

