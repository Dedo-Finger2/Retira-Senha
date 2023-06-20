<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login de usuários cadastrados</h1>
    <!-- "Aqui vai ficar o formulário para login usuáros" - Greg -->
    <form action="#" method="post">

        <label>Nome</label> <!-- "Nome do input" - Greg -->
        <input type="text" name="nome"> <!-- "Input em si" - Greg -->

        <!-- 
            "Vai ser interessante esse input ser customizado, aceitar apenas um valor parecido com RG
            Tipo assim: 12.345.678-9
            Esse input deve colocar os pontos e hífen automaticamente, ou apenas recusar eles e aceitar apenas os números" - Greg
        -->
        <label>RG</label>
        <input type="text" name="rg">
        
        <a href="cadastro.html">Não possui conta?</a>
        <!--
            "Acho que sei como fazer isso funcionar, não garanto nada e nem vou dar atenção a isso por enquanto" - Greg
        -->
        <a href="#">Esqueci minha senha</a> 

        <button type="submit">Logar</button>
    </form>
</body>
</html>