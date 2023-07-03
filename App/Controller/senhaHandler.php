<?php 
use App\Model\ModelSenha;
session_start();

require __DIR__."/../../vendor/autoload.php"; // Autoload

use App\Controller\ControllerSenha;

/**
 * Se vier um POST então escolher o que fazer com ele a depender do valor dele
 * por padrão retorne o usuário para a tela de filtragem
 * 
 * Se for um GET e não POST, então escolher o que fazer a depender de qual valor é o GET
 */
if (isset($_POST['acao'])) {

    switch ($_POST['acao']) {
        case 'claimPassword': // Se o usuário quiser pegar uam senha...
            $senhaSelecionada = (new ControllerSenha())->claimPassword($_SESSION['idUsuario'], $_POST['senha']);
            header("Location: ../View/index.php?senhaObtida=true");
        break;
        
        default:
            echo "Vish, foi de Arembepe o sistema. Volte mais tarde.";
        break;
    }
} elseif (isset($_GET)) {

    switch ($_GET) {
        case isset($_GET['devolverSenha']): // Se o usuário quiser devolver a senha...
            $idSenha = $_GET['devolverSenha'];
            $senhaDevolvida = (new ModelSenha())->returnPassword($idSenha);   
            header("Location: ../View/index.php");
        break;

        default:
            echo "Vish, foi de Arembepe o sistema. Volte mais tarde.";
        break;
    }
}
//print_r($_POST);
