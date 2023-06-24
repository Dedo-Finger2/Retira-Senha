<?php

require __DIR__."/../../vendor/autoload.php";

use App\Controller\ControllerTurma;

$turnos = (new ControllerTurma())->getTurnos();
$faixas_etarias = (new ControllerTurma())->getFaixaEtarias();

?>

<div class="container">
     <div class="row">
        <div class="card card-sm">
            <div class="card-body">
                
        <h2>Marque as informações do curso que você tem interesse</h2>
        <form  class="form-control-sm" action="senhasFiltradas.php" method="post">   

        <div class="mb-6">
        <div class="mb-3">
            <label>Nome do curso</label> <!-- "Nome do input" - Greg -->
            <select class="form-select form-select-sm  custom-select-width" aria-label="Default select example" name="nomeCurso"> <!-- "Select" - Greg -->
                <option value="#">Analise</option> <!-- "Dados do banco serão inseridos aqui sempre dentro de um <option></option>" - Greg -->
            </select>
        </div>
        </div>

        <div class="mb-6">
        <div class="mb-3">
            <label>Faixa etária</label>
            <select  class=" form-select form-select-sm  custom-select-width" aria-label="Default select example" name="faixaEtaria">
                <?php
                    foreach ($faixas_etarias as $faixa_etaria) {
                        ?>
                        <option value="<?= $faixa_etaria ?>"><?=$faixa_etaria?></option>
                        <?php
                    }
                ?>
            </select>
            </div>
        </div>

        <div class="mb-6">
            <div class="mb-3">
                <label>Turno</label>
                <select  class="form-select form-select-sm  custom-select-width" aria-label="Default select example" name="turno">
                <?php
                    foreach ($turnos as $turno) {
                        ?>
                        <option value="<?= $turno ?>"><?=$turno?></option>
                        <?php
                    }
                ?>
                </select>
        </div>
    </div>
    
    <!--
        "O nome desses checkbox é o mesmo porque assim eles são tratados como um array!
        Com isso vamos poder saber quais dias da semana o usuário escolheu e filtrar as senhas" - Greg
    -->

    <!-- Checkbox -->
                
    <div class="col-md-6">
    <h3>Dias da semana:</h3>

    <div class="form-check form-check-inline">
        <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Segunda-feira">
        <label class="form-check-label" for="inlineCheckbox1">Segunda-feira</label>
    </div>

    <div class="form-check form-check-inline">
        <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Terça-feira">
        <label class="form-check-label" for="inlineCheckbox2">Terça-feira</label>
    </div>

    <div class="form-check form-check-inline">
        <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Quarta-feira">
        <label class="form-check-label" for="inlineCheckbox3">Quarta-feira</label>
    </div>

    <div class="form-check form-check-inline">
        <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox4" value="Quinta-feira">
        <label class="form-check-label" for="inlineCheckbox4">Quinta-feira</label>
    </div>

    <div class="form-check form-check-inline">
        <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox5" value="Sexta-feira">
        <label class="form-check-label" for="inlineCheckbox5">Sexta-feira</label>
    </div>

    <button type="submit" class="btn btn-primary">Filtrar senhas</button>
                
    </form>
                </div> <!--Fechamento div card-body -->
            </div> <!--Fechamento div card -->
        </div>  <!--Fechamento div col md6-->
</div> <!--Fechamento div container -->