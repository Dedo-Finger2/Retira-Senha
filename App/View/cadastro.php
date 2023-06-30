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
    <title>Cadastro</title>
    <!--NAVBAR PROVISÓRIA-->
    <?php //require_once("navbar.php"); ?>
</head>

<body>
    <!-- Container que engloba os outros dois: Imagem e formulário -->
    <div class="container d-flex align-items-center justify-content-center">
        <!-- Container do formulário -->
        <div class="form-wrapper flex-row">
            <h1 class="text-center">Cadastro</h1>
            <form action="../Controller/cadastroHandler.php" method="post">

                <div class="form-group">
                    <label for="nomeId">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nomeId"
                        placeholder="Digite seu nome completo:" required>
                </div>

                <div class="form-group">
                    <label for="emailId">Email</label>
                    <input type="email" name="email" class="form-control" id="emailId" placeholder="Digite seu email:" required>
                </div>

                <div class="form-group">
                    <label for="senhaId">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senhaId"
                        placeholder="Digite uma senha:" required>
                </div>

                <!-- 
                    "Vai ser interessante esse input ser customizado, aceitar apenas um valor parecido com RG
                    Tipo assim: 12.345.678-9
                    Esse input deve colocar os pontos e hífen automaticamente, ou apenas recusar eles e aceitar apenas os números" - Greg
                -->
                <div class="form-group">
                    <label for="rgId">RG</label>
                    <input type="text" name="rg" pattern="\d{2}\.\d{3}\.\d{3}-\d" class="form-control" id="rg"
                        placeholder="Digite seu RG:" maxlength="12" required>
                    <small id="nomeHelpe" class="form-text text-muted">Apenas números (9 dígitos), Ex:
                        123456789</small>
                </div>

                <!-- Cadastrar e link para a tela de login -->
                <button type="submit" class="btn btn-primary text-white">Cadastrar</button>
                <br><br>
                <a href="login.php">Já possui conta?</a>
            </form>
        </div>

        <!-- Container da imagem -->
        <div class="image-wrapper">
            <h1 class="text-center" id="bem-vindo">Bem vindo!!</h1>
            <p class="font-weight-light text-center">Para retirar uma senha de cursos da Cidade do Saber você deve se
                cadastrar no nosso site! Assim você pode evitar grandes filas e retirar uma senha digital.</p>
            <img src="../Public/img/webinar-animate.svg" class="img-fluid" alt="Imagem responsiva">
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
</body>
</html>