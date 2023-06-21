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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../Public/Css/style.css">
        <title>Filtragem de senhas</title>
        <!--NAVBAR PROVISÓRIA-->
        <?php require_once("navbar.php"); ?>
    </head>
    <body>
        <h1>Filtrando senhas</h1>
        <form action="senhasFiltradas.php" method="post">
            
            <label>Nome do curso</label> <!-- "Nome do input" - Greg -->
            <select name="nomeCurso"> <!-- "Select" - Greg -->
                <option value="#">Analise</option> <!-- "Dados do banco serão inseridos aqui sempre dentro de um <option></option>" - Greg -->
            </select>
            
            <label>Turno</label>
            <select name="turno">
                <option value="#">Analise</option>
            </select>
            
            <label>Faixa etária</label>
            <select name="faixaEtaria">
                <option value="#">Analise</option>
            </select>

            <br><br> <!-- "Quebra de linha pq não aguentei o agrupamento disso tudo kk" - Greg -->
            
            <!--
                "O nome desses checkbox é o mesmo porque assim eles são tratados como um array!
                Com isso vamos poder saber quais dias da semana o usuário escolheu e filtrar as senhas" - Greg
            -->
            <h2>Dias da semana:</h2>

            <div class="form-check form-check-inline">
                <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Segunda-feira">
                <label class="form-check-label" for="inlineCheckbox1">Segunda-feira</label>
            </div>

            <div class="form-check form-check-inline">
                <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Terça-feira">
                <label class="form-check-label" for="inlineCheckbox2">Terça-feira</label>
            </div>

            <div class="form-check form-check-inline">
                <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Quarta-feira">
                <label class="form-check-label" for="inlineCheckbox3">Quarta-feira</label>
            </div>

            <div class="form-check form-check-inline">
                <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox4" value="Quinta-feira">
                <label class="form-check-label" for="inlineCheckbox4">Quinta-feira</label>
            </div>

            <div class="form-check form-check-inline">
                <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox5" value="Sexta-feira">
                <label class="form-check-label" for="inlineCheckbox5">Sexta-feira</label>
            </div>

            <button type="submit" class="btn btn-primary">Filtrar senhas</button>
        </form>
    </body>
</html>