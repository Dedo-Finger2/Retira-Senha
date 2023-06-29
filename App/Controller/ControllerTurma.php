<?php

namespace App\Controller;

use Exception; // "Chamando as exeções (padrão do PHP) para tratar de erros mais facilmente" - Greg
use App\Model\ModelTurma;

class ControllerTurma
{
    /**
     * Esse método coleta os turnos da consulta do Model e põe eles dentro de um array menor
     * contendo só os turnos mesmo
     * @return array - Turnos disponíveis no banco de dados
     */
    public function getTurnos()
    {
        /**
         * Array que vai guardar os turnos retornados pelo método do Model Turma
         */
        $turnosArray = [];
        $turnos = (new ModelTurma())->returnTurnos();

        /**
         * Para array de turnos como $turno, empurre no array $turnosArray o valor presente no atributo turno da variável $turno
         */
        foreach ($turnos as $turno) {
            array_push($turnosArray, $turno->turno);
        }

        return $turnosArray; // Retorna os turnos do banco
    }

    /**
     * Esse método coleta os turnos da consulta do Model e põe eles dentro de um array menor
     * contendo só os turnos mesmo
     * @return array - Array com as idades ordenadas
     */
    public function getIdadesMinimas()
    {
        $idadeMinima = (new ModelTurma())->returnIdadeMinima();
        $idadeMinimaArray = [];

        /**
         * Para cada idade presente no array, verifique se essa idade é maior que 0 e não seja vazia
         * se isso for verdade, adicione essa idade ao novo array $idadeMinimaArray e passe para a próxima até acabar
         */
        foreach ($idadeMinima as $idade) {
            if ($idade > 0 && !empty($idade)) {
                array_push($idadeMinimaArray, $idade);
            }
        }

        /**
         * Ordena as idades (ASC)
         */
        sort($idadeMinimaArray);

        return $idadeMinimaArray;
    }

    /**
     * Esse método coleta os turnos da consulta do Model e põe eles dentro de um array menor
     * contendo só os turnos mesmo
     * @return array - Array com as idades ordenadas
     */
    public function getIdadesMaximas()
    {
        $idadeMaxima = (new ModelTurma())->returnIdadeMaxima();
        $idadeMaximaArray = [];

        /**
         * Para cada idade presente no array, verifique se essa idade é maior que 0 e não seja vazia
         * se isso for verdade, adicione essa idade ao novo array $idadeMaximaArray e passe para a próxima até acabar
         */
        foreach ($idadeMaxima as $idade) {
            if ($idade > 0 && !empty($idade)) {
                array_push($idadeMaximaArray, $idade);
            }
        }
        
        /**
         * Ordena as idades (DESC)
         */
        rsort($idadeMaximaArray);

        return $idadeMaximaArray;
    }
}
