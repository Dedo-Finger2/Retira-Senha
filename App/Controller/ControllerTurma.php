<?php

namespace App\Controller;

use Exception; // "Chamando as exeções (padrão do PHP) para tratar de erros mais facilmente" - Greg
use App\Model\ModelTurma;

class ControllerTurma
{
    /**
     * Esse método coleta os turnos da consulta do Model e põe eles dentro de um array menor
     * contendo só os turnos mesmo
     */
    public function getTurnos()
    {
        $turnosArray = [];
        $turnos = (new ModelTurma())->returnTurnos();

        foreach ($turnos as $turno) {
            array_push($turnosArray, $turno->turno);
        }

        return $turnosArray;
    }
}
