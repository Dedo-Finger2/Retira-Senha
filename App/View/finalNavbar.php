<?php
use App\Controller\ControllerCadastro;
    require __DIR__."/../../vendor/autoload.php";
    $idUsuario = $_SESSION['idUsuario'];

    $usuario = (new ControllerCadastro())->showName($idUsuario);

?>
<!-- ícone da navbar -->
<link rel="icon" type="image/png" href="../Public/img/Logo-icon-blue.png"></link>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-nosso-azul border-bottom border-bottom-dark w-100" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><strong>Retira Senha</strong></a> <!-- Logo -->

        <!-- Botão pra abrir e fechar ela quando estiver muito pequena a tela -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php"><strong>Minhas senhas</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="filtragemDeSenhas.php"><strong>Vagas disponiveis</strong></a>
                </li>
            </ul>

            <!-- Nome do usuário -->
            <div class="text-white me-3">
                <?php
                    if ($usuario) {
                        echo "<i class='fa-solid fa-user'></i> <strong>".$usuario."</strong>";
                    } else {
                        echo "Usuário";
                    }
                ?>
            </div>
            <!-- Log-off -->
            <br>
            <form action="../Controller/cadastroHandler.php" method="post">
                <button type="submit" class="btn btn-danger"><strong>Log-off</strong></button>
            </form>
            <!-- O action desse formulário tem que ir para o Controller/cadastroHandler.php -->
        </div>
    </div>
</nav>
<!-- Scripts do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/85b090ab76.js" crossorigin="anonymous"></script>