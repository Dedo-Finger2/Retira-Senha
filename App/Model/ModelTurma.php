<?php

namespace App\Model;
use CoffeeCode\DataLayer\DataLayer; // "Chamando a classe Datalayer para servir como herança para a classe Cadastro" - Greg

class ModelTurma extends DataLayer
{
    /**
     * Construtor base, toda classe vai ter um igual
     * 
     * [ Estrutura ]
     * parent::__construct("nome_tabela", ["campos", "notNulls"], "primary_key_da_tabela", possui_time_stamp? True ou falso);
     */
    public function __construct()
    {
        parent::__construct("turma", [], "cod_turma", false);
    }

    /**
     * Esse método é responsável por consultar os turnos disponíveis no banco de dados
     * @return array - Turnos do banco de dados
     */
    public function returnTurnos()
    {
        /**
         * Consulta que retorna apenas os valores diferentes da turma, no caso os turnos
         * Então o resultado disso vai ser um turno de cada um que exista, tudo isso dentro de um array
         */
        $turnos = (new ModelTurma())->find(
            null,
            null,
            "DISTINCT turno"
        )->fetch(true);

        return $turnos;
    }

    /**
     * Esse método via ser responsável por retornar o nome e ID dos cursos disponíveis no banco
     * Apenas os nomes serão exibidos ao usuário
     * @return array - Array com o nome e ID dos cursos
     */
    public function returnCursos()
    {
        # Código aqui...
    }

    /**
     * Esse método é responsável por consultar as faixas etárias disponíveis no banco de dados
     * @return array - Faixa etárias do banco de dados
     */
    public function returnFaixaEtaria()
    {
        /**
         * Consulta que retorna apenas os valores diferentes da turma, no caso os turnos
         * Então o resultado disso vai ser um turno de cada um que exista, tudo isso dentro de um array
         */
        $faixas_etarias = (new ModelTurma())->find(
            null,
            null,
            "DISTINCT nome_faixa_etaria"
        )->fetch(true);

        return $faixas_etarias;
    }

}
