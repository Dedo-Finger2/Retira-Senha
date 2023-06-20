<?php 

require __DIR__."/../../vendor/autoload.php"; // Requirindo o autoload

use App\Controller\ControllerCadastro;

/**
 * Ação conta quantos índices possui o POST que veio para esse arquivo
 * Se for 4 índices, então são 4 inputs que foram usados, ou seja, é um cadastro novo
 * Se for 2 índices, então são 2 inputs que foram usados, ou seja, é um login
 * Se for 0 índices, então são 0 inputs que foram usados, ou seja, é um logOff
 */
$acao = count($_POST);

switch (intval($acao)) {
    /**
     * Cadastro
     */
    case 4:
        $newUser = (new ControllerCadastro())->register($_POST); // Usando o método de registrar
        header("Location: ../view/login.php"); // Mandando pra tela de login pra pessoa
    break;
    /**
     * Login
     */
    case 2:
        if ($loginUser == false) {
            header("Location: ../View/login.php");
        }
        $loginUser = (new ControllerCadastro())->login($_POST);
        
    break;
    /**
     * O botão de logoff é um formulário sem indice, então se for 0 o usuário quer sair do sistema
     * [OBS]: Talvez fazer uma verificação se o que foi apertado foi o botão de log-off mesmo seria mais interessante
     */
    case 0:
        $logOffUser = (new ControllerCadastro())->logOff(); // Executa o método de logOff
    break;

    default:
        echo "Bah, o sistema foi de Arembepe.";
}



