<?php 

session_start();

require __DIR__."/../../vendor/autoload.php";

use App\Model\ModelSenha;


if (isset($_POST)) {
    switch ($_POST['acao']) {
        case 'claimPassword':
            $senhaSelecionada = (new ModelSenha())->claimPassword($_SESSION['idUsuario'],$_POST['idSenha']);
            header("Location: ../View/filtragemDeSenhas.php?senhaObtida=true");
        break;
        
        case 2:
        
        break;
        
        default:
            header("Location: ../View/filtragemDeSenhas.php?error=true");
        break;
    }
} elseif (isset($_GET)) {
    switch ($_GET) {
        case isset($_GET['devolverSenha']):
            $idSenha = $_GET['devolverSenha'];
            echo "Devolveu a senha $idSenha";    
        break;
        
        case isset($_GET['maisInformacoes']):
            $idSenha = $_GET['maisInformacoes'];
            echo "Mais info da senha $idSenha";
        break;

        default:
            echo "ouxi";
        break;
    }
}
//print_r($_POST);
