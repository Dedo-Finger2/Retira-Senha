<?php

namespace App\Model;
use CoffeeCode\DataLayer\DataLayer; // "Chamando a classe Datalayer para servir como herança para a classe Cadastro" - Greg
use CoffeeCode\DataLayer\Connect;

class ModelTurma extends DataLayer
{
    private $conn;

    /**
     * Construtor base, toda classe vai ter um igual
     * 
     * [ Estrutura ]
     * parent::__construct("nome_tabela", ["campos", "notNulls"], "primary_key_da_tabela", possui_time_stamp? True ou falso);
     */
    public function __construct()
    {
        parent::__construct("turma", [], "cod_turma", false);
        $this->conn = Connect::getInstance();
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
     * Esse método é responsável por consultar as idades mínimas disponíveis no banco de dados
     * @return array - Idades mínimas do banco de dados
     */
    public function returnIdadeMinima()
    {
        /**
         * Consulta que retorna apenas os valores diferentes da turma, no caso os turnos
         * Então o resultado disso vai ser um turno de cada um que exista, tudo isso dentro de um array
         */
        $idadesMinima = $this->conn->query("SELECT
        DISTINCT idade_minima FROM turma
        ");

        $idadesMinimas = array_column($idadesMinima->fetchAll(), 'idade_minima');

        return $idadesMinimas;
    }

    /**
     * Esse método é responsável por consultar as idades máximas disponíveis no banco de dados
     * @return array - Idades máximas do banco de dados
     */
    public function returnIdadeMaxima()
    {
        /**
         * Consulta que retorna apenas os valores diferentes da turma, no caso os turnos
         * Então o resultado disso vai ser um turno de cada um que exista, tudo isso dentro de um array
         */
        $idadesMaxima = $this->conn->query("SELECT
        DISTINCT idade_maxima FROM turma
        ");

        $idadesMaximas = array_column($idadesMaxima->fetchAll(), 'idade_maxima');

        return$idadesMaximas;
    }
}
