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
    <title>Filtragem de senhas</title>
    <?php require_once("navbar.php"); ?>
</head>
<body>
    <h1>Filtrando senhas</h1>
    <form action="senhasFiltradas.html" method="post">
        
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
        <label>Dias de aula</label> 
        <input type="checkbox" name="dias[]">Segunda-Feira
        <input type="checkbox" name="dias[]">Terça-Feira
        <input type="checkbox" name="dias[]">Quarta-Feira
        <input type="checkbox" name="dias[]">Quinta-Feira
        <input type="checkbox" name="dias[]">Sexta-Feira
        <input type="checkbox" name="dias[]">Sábado

        <button type="submit">Filtrar senhas</button>

    </form>
</body>
</html>