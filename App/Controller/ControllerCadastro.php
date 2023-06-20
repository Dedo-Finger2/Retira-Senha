<?php

namespace App\Controller; // "Local da classe" - Greg

use App\Model\ModelCadastro;
use Exception; // "Chamando as exeções (padrão do PHP) para tratar de erros mais facilmente" - Greg

class ControllerCadastro
{
    /**
     * Executando verificações de segurança e então registrando um novo usuário
     * @param array $data - Um array vindo de um formulário
     */
    public function register($data)
    {
        /**
         * Pegando o email do usuário e tentando encontrar esse eamil no banco de dados
         * Se a query retornar algo, significa que o usuário já tem cadastro no nosso sistema e deve se logar ao invés de cadastrar
         */
        $email = $data['email'];
        $usuario = (new ModelCadastro())->find("email = '{$email}'")->fetch();
        if ($usuario) {
            echo "Usuário já cadastrado";
            header("Location: ../View/cadastro.html?msg=você já possui cadastro!");
            exit();
        }

        /**
         * Se o usuário não for cadastrado, tentar cadastrar ele
         * Qualquer exceção mostrar ao usuário.
         */
        try {
            $newUsuario = (new ModelCadastro())->registerUser($data['nome'], $data['email'], $data['senha'], $data['rg']);
            $newUsuario->save(); // Salva o novo usuário no banco de dados
        } catch (Exception $e) {
            /**
             * Mostra a exceção se tiver
             */
            echo "[ERRO]: ". $e->getMessage();
            exit();
        }

        /**
         * Retorna o novo usuário cadastrado
         */
        return $newUsuario;
    }
}
