<!-- "A barra de navegação que vai ser incluída nas demais telas deve ser feita aqui" - Greg -->
<nav class="navbar navbar-expand-xxl navbar-dark ">
<a href="login.php">Login</a> - <a href="cadastro.php">Cadastro</a>-<a href="index.php">Home</a>-<a href="filtragemDeSenhas.php">Filtragem de senhas</a>-<a href="senhasFiltradas.php">Senhas filtradas</a>
<button type="submit">Log-Off</button>    
<button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link active" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="#">Action 1</a>
                    <a class="dropdown-item" href="#">Action 2</a>
                </div>
            </li>
        </ul>
        <form action="../Controller/cadastroHandler.php" method="post">
    </form>
    </div>
</nav>
<hr>
