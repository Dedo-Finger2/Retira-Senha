<?php
    /**
     * "Inicia a sessão e verifica
     * Se a variável de sessão RG for varzia, significa que o usuário é sabido demais e ta tentando acessar essa página
     * sem se logar antes! Se for caso, então mandar ele de volta pra tela de login" - Greg
     */
    session_start();

    if (!isset($_SESSION['rg'])) {
        header('Location: login.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Senhas Filtradas</title>
        <!--NAVBAR PROVISÓRIA-->
        <?php require_once("navbar.php"); ?>
    </head>
    <body>
        <h1>Senhas filtradas</h1>
        <?php require_once("../Controller/tabelaSenhasFiltradas.php") ?>
    </body>
</html>