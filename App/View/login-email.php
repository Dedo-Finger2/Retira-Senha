<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
                            <h1 class="tittle">Acesso com email e senha</h1>

                            <div class="form-group">
                            <label for="emailId">Email</label>
                            <input type="email" name="email" class="form-control" id="emailId" placeholder="Digite seu email:" required>
                            </div>

                            <div class="form-group">
                                <label for="senhaId">Senha</label>
                                <input type="password" name="senha" class="form-control" id="senhaId" placeholder="Digite uma senha:" required>
                            </div>   

                            <br>
                            <button type="submit" class="btn btn-primary">Logar</button><br><br>

                            <a href="cadastro.php">Não possui conta?</a><br>
                            <a href="login.php">Aceso com RG</a> 
                        </form>
                    </div>
                </div>
            </div>

            <!-- Card da direita -->
            <div class="right">
                <h1 class="tittle" id="bem-vindo-login">Bem vindo!!</h1>
                <p class="font-weight-light">É bom ter você de volta! deseja fazer uma nova consulta? </p>
                <img src="../Public/img/college-students-animate.svg" class="img-fluid" alt="Imagem responsiva" id="imagem-login">
            </div>
        </div>
        <!-- Scripts do Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>   
    </body>
</html>