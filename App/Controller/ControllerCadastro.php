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
            //echo "Usuário já cadastrado";
            header("Location: ../View/cadastro.php?msg=você já possui cadastro!");
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

    /**
     * Executando verificações de segurança e então dando permissão ao usuário pra entrar no sistema
     * Aqui será usado sessões
     * @param array $data - Array vindo do formulário
     */
    public function login($data): ControllerCadastro
    {
        /**
         * Logando o usuário com as credenciais vindas do formulário de login normal
         * Se existir um campo RG no formulário, então o usuário está tentando logar com Nome e RG
         * Senão existir o campo RG, mas existir o campo Email, então o usuário está tentando logar com Email e Senha (Login2)
         */
        if ($data['rg']) {
            $usuario = (new ModelCadastro())->loginUser($data['nome'], $data['rg']);

            /**
             * Se esse login der certo, então inicie a sessão e armazene o RG do sujeito na sesão atual dele
             * e então mande ele pra tela de home e retorne o objeto
             */
            if ($usuario) {
                session_start();
                $_SESSION['rg'] = $data['rg'];
                header("Location: ../View/index.php");
                return $this;
            }

        } elseif($data['email']) {
            $email = $data['email'];
            $usuario = (new ModelCadastro())->loginUser(NULL, NULL, $data['email'], $data['senha']);

            /**
             * Se retornar true a passagem de dados acima com a variável $usuario então...
             * consulta o Email do usuário pra ver se aparece algum registro, se aparecer então...
             * inicie a sessão e atribua à variável de sessão $_SESSION['rg'] o valor RG da consulta feita com o email
             * depois mande o usuário para a home e retorne o objeto
             */
            if ($usuario) {
                $usuarioRg = (new ModelCadastro())->find("email = '{$email}'")->fetch();
                session_start();
                $_SESSION['rg'] = $usuarioRg->rg;
                header("Location: ../View/index.php");
                return $this;
            }
        }

        return $this;
    }

    /**
     * Executando verificações de segurança e então encerrando a sessão do usuário
     */
    public function logOff(): ControllerCadastro
    {
        /**
         * Iniciando a sessão
         */
        session_start();
        /**
         * Se existir um rg na sessão atual, então significa que o usuário está sim logado
         */
        if ($_SESSION['rg']) {
            /**
             * Tenta encerrar a sessão do usuário com o método logOff
             */
            try {
                $modelLogOff = (new ModelCadastro())->logOff();
                /**
                 * Depois de tirar a sessão do usuário, o sistema vai mandar ele pra página de login
                 * dirname($_SERVER['PHP_SELF]) - Isso pega a pasta pai do arquivo atual, é um complemento pra conseguir acessar a página de login
                 * de qualquer outro lugar do sistema
                 */
                header('Location: ' . dirname($_SERVER['PHP_SELF']) . '/../View/login.php');
            } catch (Exception $e) {
                echo "[ERRO]" . $e->getMessage();
            }
        }
        return $this;
    }
}
