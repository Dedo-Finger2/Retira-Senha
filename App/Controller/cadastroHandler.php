<?php 

require __DIR__."/../../vendor/autoload.php";

use App\Controller\ControllerCadastro;

/**
 * Ação conta quantos índices possui o POST que veio para esse arquivo
 * Se for 4 índices, então são 4 inputs que foram usados, ou seja, é um cadastro novo
 * Se for 2 índices, então são 2 inputs que foram usados, ou seja, é um login
 */
$acao = count($_POST);

switch (intval($acao)) {
    /**
     * Cadastro
     */
    case 4:
        $newUser = (new ControllerCadastro())->register($_POST);
        header("Location: ../view/login.php");
        break;
    /**
     * Login
     */
    case 2:
        # ...
    break;

    default:
        echo "Bah, o sistema foi de Arembepe.";
}



