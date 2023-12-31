<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../Public/Css/newStyle.css">
    <link rel="icon" type="image/png" href="../Public/img/Logo-icon-blue.png">
    </link>
    <title>Login</title>
    <!--NAVBAR PROVISÓRIA-->
    <?php //require_once("navbar.php"); ?>
</head>

<body>
    <!-- Container que engloba os outros dois: Imagem e formulário -->
    <div class="container d-flex align-items-center justify-content-center">

        <!-- Container do formulário -->
        <div class="form-wrapper flex-row">
            <h1 class="tittle-login text-center">Login</h1>

            <!-- "Aqui vai ficar o formulário para login usuáros" - Greg -->
            <form action="../Controller/cadastroHandler.php" method="post">
                <div class="form-group">
                    <label for="nomeId">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nomeId"
                        placeholder="Digite seu nome completo:">
                </div>

                <div class="form-group">
                    <label for="rgId">RG</label>
                    <input type="text" name="rg" pattern="\d{2}\.\d{3}\.\d{3}-\d" class="form-control" id="rg"
                        placeholder="Digite seu RG:" maxlength="12" required>
                    <small id="nomeHelpe" class="form-text text-muted">Apenas números (9 dígitos), Ex:
                        12.345.678-9</small>
                </div>

                <button type="submit" class="btn btn-primary">Logar</button><br><br>

                <a href="cadastro.php">Não possui conta?</a><br>
                <a href="login-email.php">Acesso com email e senha</a>
            </form>
        </div>

        <!-- Container da imagem -->
        <div class="image-wrapper">
            <h1 class="text-center" id="bem-vindo-login">Bem vindo!!</h1>
            <p class="font-weight-light text-center">É bom ter você de volta! deseja fazer uma nova consulta? </p>
            <img src="../Public/img/college-students-animate.svg" alt="Imagem responsiva">
        </div>
    </div>

    <!-- Scripts do bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
        crossorigin="anonymous"></script>

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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (<?php echo intval(isset($_GET['jaCadastrado'])); ?>) {
                window.alert('Você já possui cadastro no nosso sistema! \nEfetue o Login usando seu Nome e RG ou seu Email e senha.');
            } if (<?php echo intval(isset($_GET['credenciais'])); ?>) {
                window.alert('As credênciais fornecidas parecem estar erradas. \n\nEscreva novamente com mais calma ou faça seu cadastro caso não tenha ainda.');
            }
        });
    </script>
</body>

</html>