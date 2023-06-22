<?php

require __DIR__."/../../vendor/autoload.php";

use App\Model\ModelTurma;
use App\Controller\ControllerTurma;


$teste = (new ModelTurma())->returnTurnos();

$turno = (new ControllerTurma())->getTurnos();

print_r($turno);
