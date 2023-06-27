<?php 

session_start();

require __DIR__."/../../vendor/autoload.php";

use App\Model\ModelSenha;


switch ($_POST) {
    case 'claimPassword':
        $senhaSelecionada = (new ModelSenha())->claimPassword($_SESSION['idUsuario'],$_POST['idSenha']);
    break;
    
    case 2:
    
    break;
    
    default:
        echo "Deu algum probleminha, tente novamente mais tarde.";
    break;
}


//print_r($_POST);
