<?php 

require __DIR__."/../../vendor/autoload.php";

use App\Model\ModelCadastro;
use App\Controller\ControllerCadastro;

/**
 * Testando registro de novos usuários
 * [Situação]: FUNCIONANDO!
 */
$user = (new ModelCadastro())->registerUser("Dedo", "dedo@gmail.com", "123", "000.000.000-12");
//var_dump($user);


/**
 * Testando registro de usuários com o controller + básico de segurança e integridade de dados
 * [Situação]: FUNCIONANDO!
 */
$data = [
    "nome" => "wendson",
    "email" => "wendson@gmail.com",
    "senha" => "123",
    "rg" => "000.000.000-12"
];

$userController = (new ControllerCadastro())->register($data);
var_dump($userController);