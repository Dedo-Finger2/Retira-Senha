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
        <table> <!-- "Tabela com as senhas filtradas de a cordo com o que o usuário está buscando" - Greg -->
            <thead> <!-- "Cabeçalho da tabela" - Greg -->
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                    <th>Column 3</th>
                </tr>
            </thead>
            <tbody> <!-- "Corpo da tabela, os dados entram aqui separados por <tr> e cada linha sendo um <td>" - Greg -->
                <tr>
                    <td>Analise</td>
                    <td>Analise</td>
                    <td>Analise</td>
                </tr>
            </tbody>
            <tfoot> <!-- "Rodapé da tabela, mesma coisa do cabeçalho só que embaixo kk" - Greg -->
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                    <th>Column 3</th>
                </tr>
            </tfoot>
        </table>
    </body>
</html>