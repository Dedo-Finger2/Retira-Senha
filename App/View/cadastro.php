<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <?php require_once("navbar.php"); ?>
</head>
<body>
    <h1>Cadastro de usuários</h1>
    <!-- "Aqui vai ficar o formulário para cadastro de novos usuáros" - Greg -->
    <form action="../Controller/cadastroHandler.php" method="post">

        <label>Nome</label> <!-- "Nome do input" - Greg -->
        <input type="text" name="nome"> <!-- "Input em si" - Greg -->
        
        <label>Email</label>
        <input type="email" name="email">

        <label>Senha</label>
        <input type="password" name="senha">

        <!-- 
            "Vai ser interessante esse input ser customizado, aceitar apenas um valor parecido com RG
            Tipo assim: 12.345.678-9
            Esse input deve colocar os pontos e hífen automaticamente, ou apenas recusar eles e aceitar apenas os números" - Greg
        -->
        <label>RG</label>
        <input type="text" id="rg" name="rg" pattern="\d{2}\.\d{3}\.\d{3}-\d" maxlength="12" required>
        
        <a href="login.php">Já possui conta?</a>

        <button type="submit">Cadastrar</button>
    </form>

    <!-- Script que auto completa o RG do usuário com pontos e hífen -->
    <script>
        const rgInput = document.getElementById('rg');
    
        function formatarRG(valor) {
            
            // Remove tudo o que não é dígito/número
            valor = valor.replace(/\D/g, '');
    
            // Adiciona os pontos e hífen automaticamente
            valor = valor.replace(/^(\d{2})(\d{3})(\d{3})(\d{1})$/, '$1.$2.$3-$4');
    
            // Retorna o valor formatado com os valores, pontos e hífen
            return valor;
        }
    
        rgInput.addEventListener('input', function (event) {
            // Obtém o valor atual do input de RG
            let valorAtual = event.target.value;
    
            // Formata o valor do campo
            valorAtual = formatarRG(valorAtual);
    
            // Define o valor formatado no campo
            event.target.value = valorAtual;
        });
    </script>
</body>
</html>