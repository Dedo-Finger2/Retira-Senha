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
        case 'claimPassword': // Se o usuário quiser pegar uma senha...
            $senha = $_POST['senha'];
            $senhaSelecionada = (new ControllerSenha())->claimPassword($_SESSION['idUsuario'], $_POST['senha']);
            header("Location: ../View/index.php?senhaObtida=true&senha=$senha");
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
            header("Location: ../View/index.php?reverter=true&idSenha=$idSenha");
        break;
        
        case isset($_GET['senhaReverter']): // Se o usuário devolver uma senha...
            /**
             * Executar o método de pegar senha novamente com o ID do usuário e o ID da senha
             */
            $senhaRecuperada = (new ControllerSenha())->claimPassword($_SESSION['idUsuario'], $_GET['senhaReverter']);
            header("Location: ../View/index.php");
        break;

        default:
            echo "Vish, foi de Arembepe o sistema. Volte mais tarde.";
        break;
    }
}
//print_r($_POST);
