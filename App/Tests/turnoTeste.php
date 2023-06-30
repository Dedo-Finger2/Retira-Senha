<?php

/**
 * Testando o método de retornar turnos
 */

require __DIR__."/../../vendor/autoload.php"; // Autolaod

use App\Model\ModelTurma;
use App\Controller\ControllerTurma;


$teste = (new ModelTurma())->returnTurnos();

$turno = (new ControllerTurma())->getTurnos();

print_r($turno);
