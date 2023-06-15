<?php

require __DIR__."/../../vendor/autoload.php";

use CoffeeCode\DataLayer\Connect;

$conn = Connect::getInstance(); // Estabelendo conexão num objeto PDO
$error = Connect::getError(); // Todos os erros aqui


/**
 * Se der erro
 * @return pdo $error - Mensagem de erro do banco de dados
 */
if ($error) { 
    echo $error->getMessage();
    die();
}

$query = $conn->query("SELECT * FROM anexo"); // String de query
print_r($query->fetchAll()); // fetchAll executa a string acima
