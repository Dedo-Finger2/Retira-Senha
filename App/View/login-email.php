<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../Public/Css/style.css">
        <title>Login-Email</title>
        <!--NAVBAR PROVISÓRIA-->
        <?php require_once("navbar.php"); ?>
    </head>
    <body>
        <div class="container">
            <!-- Card da esquerda -->
            <div class="left">
                <div class="card">
                    <div class="card-body">
                        <!-- "Aqui vai ficar o formulário para login usuáros" - Greg -->
                        <form action="../Controller/cadastroHandler.php" method="post">
                            <h1 class="tittle-login">Acesso com email e senha</h1>

                            <div class="form-group">
                            <label for="emailId">Email</label>
                            <input type="email" name="email" class="form-control" id="emailId" placeholder="Digite seu email:" required>
                            </div>

                            <div class="form-group">
                                <label for="senhaId">Senha</label>
                                <input type="password" name="senha" class="form-control" id="senhaId" placeholder="Digite uma senha:" required>
                            </div>   

                            <button type="submit" class="btn btn-success">Logar</button><br><br>

                            <a href="cadastro.php">Não possui conta?</a><br>
                            <a href="login.php">Aceso com RG</a> 
                        </form>
                    </div>
                </div>
            </div>

            <!-- Card da direita -->
            <div class="right">
                <h1 class="tittle-login" id="bem-vindo-login">Bem vindo!!</h1>
                <p class="font-weight-light">É bom ter você de volta! deseja fazer uma nova consulta? </p>
                <img src="../Public/img/kids-studying-from-home-animate.svg" class="img-fluid" alt="Imagem responsiva" id="imagem-login">
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>