<?php
use App\Controller\ControllerCadastro;
    require __DIR__."/../../vendor/autoload.php";
    $idUsuario = $_SESSION['idUsuario'];

    $usuario = (new ControllerCadastro())->showName($idUsuario);

?>
    <link rel="icon"
        type="image/png"
        href="../Public/img/Logo-icon.png">
    </link>

<nav class="navbar navbar-expand-lg bg-nosso-azul border-bottom border-bottom-dark " data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Retirar Senha</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Minhas senhas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="filtragemDeSenhas.php">Vagas disponiveis</a>
                </li>
            </ul>
            <!-- Nome do usuário -->
            <div class="text-white me-3">
                <?php
                    if ($usuario) {
                        echo "<strong>".$usuario."</strong>";
                    } else {
                        echo "Usuário";
                    }
                ?>
            </div>
            <form action="../Controller/cadastroHandler.php" method="post">
                <button type="submit" class="btn btn-danger">Log-off</button>
            </form>
            <!-- O action desse formulário tem que ir para o Controller/cadastroHandler.php -->
        </div>
    </div>
</nav>
<!-- Scripts do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>