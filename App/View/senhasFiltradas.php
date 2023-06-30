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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../Public/Css/customBootstrap.css">
        <title>Senhas Filtradas</title>
        <!--NAVBAR PROVISÓRIA-->
        <?php require_once("finalNavbar.php"); ?>
    </head>
    <body>
        
        <!-- TABELA PROVISÓRIA -->
        <div class="container">
            <h1 class="text-center mt-5">Escolha sua senha</h1>
            <h2 class="text-center">Aqui você poderá escolher senhas para o curso desejado.</h2>
            <?php require_once("../Controller/tabelaSenhasFiltradas.php") ?>
        </div>
        <?php require_once("footer.php");?>
    </body>
</html>