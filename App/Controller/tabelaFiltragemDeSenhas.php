<?php

require __DIR__."/../../vendor/autoload.php";

use App\Controller\ControllerTurma;

/**
 * Puxando os resultaods do controller pra cá
 */
$turnos = (new ControllerTurma())->getTurnos();
$idadeMinima = (new ControllerTurma())->getIdadesMinimas();
$idadeMaxima = (new ControllerTurma())->getIdadesMaximas();

?>

<form action="senhasFiltradas.php" method="post">
            
    <label>Nome do curso</label> <!-- "Nome do input" - Greg -->
    <select name="nomeCurso"> <!-- "Select" - Greg -->
        <option value="#">Analise</option> <!-- "Dados do banco serão inseridos aqui sempre dentro de um <option></option>" - Greg -->
    </select>
    
    <label>Turno</label>
    <select name="turno">
        <?php
            foreach ($turnos as $turno) {
                ?>
                    <option value="<?= $turno ?>"><?=$turno?></option>
                <?php
            }
        ?>
    </select>
    
    <label>Faixa etária</label>
    De
    <select name="idadeMinima">
        <option>*</option>
        <?php
            foreach ($idadeMinima as $idade) {
                ?>
                    <option value="<?= $idade ?>"><?=$idade?></option>
                <?php
            }
        ?>
    </select>
    anos até
    <select name="idadeMaxima">
        <option>*</option>
        <?php
            foreach ($idadeMaxima as $idade) {
                ?>
                    <option value="<?= $idade ?>"><?=$idade?></option>
                <?php
            }
        ?>
    </select>

    <br><br> <!-- "Quebra de linha pq não aguentei o agrupamento disso tudo kk" - Greg -->
    
    <!--
        "O nome desses checkbox é o mesmo porque assim eles são tratados como um array!
        Com isso vamos poder saber quais dias da semana o usuário escolheu e filtrar as senhas" - Greg
    -->
    <h2>Dias da semana:</h2>

    <div class="form-check form-check-inline">
        <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="SEGUNDA">
        <label class="form-check-label" for="inlineCheckbox1">Segunda-feira</label>
    </div>

    <div class="form-check form-check-inline">
        <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="TER">
        <label class="form-check-label" for="inlineCheckbox2">Terça-feira</label>
    </div>

    <div class="form-check form-check-inline">
        <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox3" value="QUARTA">
        <label class="form-check-label" for="inlineCheckbox3">Quarta-feira</label>
    </div>

    <div class="form-check form-check-inline">
        <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox4" value="QUI">
        <label class="form-check-label" for="inlineCheckbox4">Quinta-feira</label>
    </div>

    <div class="form-check form-check-inline">
        <input name="dias[]" class="form-check-input" type="checkbox" id="inlineCheckbox5" value="SEX">
        <label class="form-check-label" for="inlineCheckbox5">Sexta-feira</label>
    </div>

    <button type="submit" class="btn btn-primary">Filtrar senhas</button>
</form>