<?php
/**
 * "Inicia a sessão e verifica
 * Se a variável de sessão RG for varzia, significa que o usuário é sabido demais e ta tentando acessar essa página
 * sem se logar antes! Se for caso, então mandar ele de volta pra tela de login" - Greg
 * "Comentei o sistema de verificação só pra ver a tela enquanto edito" - Leone
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="../Public/Css/customBootstrap.css">
        <title>Vagas disponíveis</title>

        <!--NAVBAR-->
        <?php require_once("finalNavbar.php"); ?>
    </head>

    <body>
        <!-- Formulário de filtragem de senahs -->
        <?php require_once("../Controller/tabelaFiltragemDeSenhas.php") ?>
        
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
            integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
            crossorigin="anonymous"></script>

        <!-- Footer -->
        <?php require_once ("footer.php"); ?>
    </body>
</html>