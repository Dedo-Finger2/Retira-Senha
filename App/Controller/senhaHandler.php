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
        case 'claimPassword':
            $senhaSelecionada = (new ControllerSenha())->claimPassword($_SESSION['idUsuario'], $_POST['senha']);
            header("Location: ../View/filtragemDeSenhas.php?senhaObtida=true");
        break;
        
        default:
            echo "A";
        break;
    }
} elseif (isset($_GET)) {
    switch ($_GET) {
        case isset($_GET['devolverSenha']):
            $idSenha = $_GET['devolverSenha'];
            $senhaDevolvida = (new ModelSenha())->returnPassword($idSenha);   
            header("Location: ../View/index.php");
        break;
        
        case isset($_GET['maisInformacoes']):
            $idSenha = $_GET['maisInformacoes'];
            echo "Mais info da senha $idSenha";
        break;

        default:
            echo "Vish, foi de Arembepe o sistema.";
        break;
    }
}
//print_r($_POST);
