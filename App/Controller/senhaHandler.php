<?php 

session_start();

require __DIR__."/../../vendor/autoload.php";

use App\Model\ModelSenha;

echo $_POST['senha'];

var_dump($senhaSelecionada = (new ModelSenha())->claimPassword($_SESSION['idUsuario'],$_POST['idSenha']));

//print_r($_POST);
