<?php

require __DIR__."/../../vendor/autoload.php"; // Autoload

use App\Controller\ControllerTurma;

/**
 * Puxando os resultaods do controller pra cá:
 * Turnos, Idade mínima e Idade máxima
 */
$turnos = (new ControllerTurma())->getTurnos();
$idadeMinima = (new ControllerTurma())->getIdadesMinimas();
$idadeMaxima = (new ControllerTurma())->getIdadesMaximas();

?>

<!-- Css do bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <!-- Logo na página -->
    <div class="rounded d-flex align-items-center justify-content-center">
        <img src="../Public/img/Logo-texto-preto.png" class="mt-5" style="width: 150px;" alt="Placeholder image">
    </div>

<!-- Formulário de filtragem -->
<div class="container" style="padding-bottom: 70px;">
    <div class="row d-flex justify-content-center align-items-center mb-5 mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mt-1 mb-4">Vagas disponíveis</h1> <!-- Título -->
                    <h2 class="text-center mt-3 mb-4">Aqui você poderá filtrar as senhas que deseja visualizar.</h2> <!-- Subtítulo -->
                    <!-- Formulário -->
                    <form action="senhasFiltradas.php" method="post">
                        <!-- Turnos -->
                        <div class="form-floating mb-3">
                            <select class="form-select" id="turno" name="turno" required>
                                <option selected disabled>Selecione o turno</option>
                                <?php
                                foreach ($turnos as $turno) {
                                ?>
                                    <option value="<?= $turno ?>"><?= $turno ?></option>
                                    <!-- "Dados do banco serão inseridos aqui sempre dentro de um <option></option>" - Greg -->
                                    <?php
                                }
                                ?>
                            </select>
                            <label for="turno">Turno</label>
                        </div>
                        <!-- Faixa etária -->
                        <div class="form-group mb-3">
                            <label for="faixa-etaria">Faixa etária</label>
                            <div class="d-flex">
                                <select class="form-select me-2" id="idade-inicio" name="idadeMinima" required>
                                    <option selected disabled>Início</option>
                                    <?php
                                    foreach ($idadeMinima as $idade) {
                                        ?>
                                        <option value="<?= $idade ?>"><?= $idade ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <span class="align-self-center">-</span>
                                <select class="form-select ms-2" id="idade-fim" name="idadeMaxima" required>
                                    <option selected disabled>Fim</option>
                                    <?php
                                    foreach ($idadeMaxima as $idade) {
                                        ?>
                                        <option value="<?= $idade ?>"><?= $idade ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- Dias da semana -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="segunda" value="SEGUNDA" name="dias[]">
                            <label class="form-check-label" for="segunda">Segunda-feira</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="terca" value="TERÇA" name="dias[]">
                            <label class="form-check-label" for="terca">Terça-feira</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="quarta" value="QUARTA" name="dias[]">
                            <label class="form-check-label" for="quarta">Quarta-feira</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="quinta" value="QUINTA" name="dias[]">
                            <label class="form-check-label" for="quinta">Quinta-feira</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="sexta" value="SEXTA" name="dias[]">
                            <label class="form-check-label" for="sexta">Sexta-feira</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="sabado" value="SÁBADO" name="dias[]">
                            <label class="form-check-label" for="sabado">Sábado</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar senhas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
    crossorigin="anonymous"></script>