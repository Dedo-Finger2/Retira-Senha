<?php

namespace App\Controller; // "Local da classe" - Greg

use App\Model\ModelSenha;
use Exception; // "Chamando as exeções (padrão do PHP) para tratar de erros mais facilmente" - Greg

class ControllerSenha
{
    /**
     * Esse método vai fazer validações e listar as senhas filtradas para o usuário
     * Deve ser feito uma verificação se existe o array $data['dias'], se sim então
     * o usuário escolheu dias específicos para as senhas. Se não, usar null no lugar do array.
     * 
     * [DETALHE]: Parece que está com erro esse método, mas ele está funcionando perfeitamente
     * o erro é apenas porque nem todas as saídas do método retornam um array como deveria retornar
     * @param array $data - $_POST vindo de um formulário
     * @return array - Lista com as senhas filtradas
     */
    public function listPasswords($data)
    {
        /**
         * Tentando fazer tudo, se der qualquer probleminha, guardar isso numa variável
         * do tipo Execption e mostrar na tela a mensagem de erro
         */
        try {
            /**
             * Se existir o array $data['dias'], então fazer retornar os resultados
             * usando ele
             * Senão, passar null no lugar dele e retornar dessa forma
             */
            if (isset($data['dias'])) {
                $senhas = (new ModelSenha())->listFilteredPasswords(
                    $data['turno'],
                    $data['idadeMinima'],
                    $data['idadeMaxima'],
                    $data['dias']
                );

                return $senhas;
            } else {
                $senhas = (new ModelSenha())->listFilteredPasswords(
                    $data['turno'],
                    $data['idadeMinima'],
                    $data['idadeMaxima'],
                    null
                );

                return $senhas;
            }
        } catch (Exception $e) {
            echo "Erro:" . $e->getMessage();
        }
    }

    /**
     * Esse método vai fazer validações e retornar apenas as senhas que pertencem
     * ao usuário logado no momento no sistema
     * @param int $idUsuario - Id do usuário presente no sistema atualmente, dentro de uma
     * variável de sessão
     * @return array - Senahs do usuário
     */
    public function listUserPasswords($idUsuario)
    {
        /**
         * Tenta fazer todo o processo de listar as senhas do usuário
         * se der qualquer probleminha então esse problema vai ser guardado
         * numa variável do tipo Exepction $e, e então mostrada na tela
         */
        try {
            /**
             * Se o Id do usuário existir então listar as senhas dele
             * se o resultado dessa consulta de senhas do usuário der um array vazio
             * então ele não tem senhas ainda, se for o caso então dizer pra ele o motivo
             * de não estar aparecendo nenhuma senha.
             * Se o resultado der um array com no mínimo 1 senha, então mostrar as senhas para o usuário
             */
            if (isset($idUsuario)) {
                $senhasUsuario = (new ModelSenha())->listUserPasswords($idUsuario);

                if (!empty($senhasUsuario)) {
                    return $senhasUsuario;
                } else {
                    echo "<h3 class='text-center mt-5'>Você ainda não possui senhas cadastradas. Gere sua primeira senha agora mesmo na tela de 'Vagas disponíveis'!</h3>";
                }
            }
        } catch (Exception $e) {
            echo "Erro: ". $e->getMessage();
        }
    }

    /**
     * Esse método vai fazer validações e atribuir o id do usuário
     * à senha escolhida por ele, também será mudado a SITUACAO da senha
     * de DISPONIVEL para UTILIZADA, assim não será mais mostrada como senha pegável
     * @param int $idUsuario - Id do usuário logado no sistema
     * @param string $autenticacao - Nome da senha, coluna autenticacao da tabela senha
     */
    public function claimPassword($idUsuario, $autenticacao)
    {
        /**
         * Tenta fazer todo o processo de atribuir senhas ao usuário
         * qualquer probleminha é guardado numa variável do tipo Exepction $e
         */
        try {
            /**
             * Se existir um id de usuário e a autenticacao da senha, então o procedimento pode continuar
             * é passado os parâmetros para o método claimPassword e depois é retornado as senha que foi selecionada
             */
            if (isset($idUsuario) && isset($autenticacao)) {
                $senhaSelecionada = (new ModelSenha())->claimPassword($idUsuario, $autenticacao);

                return $senhaSelecionada;
            }
        } catch (Exception $e) {
            echo "Erro: ". $e->getMessage();
        }
    }
}