<?php

/**
 * Constante de conexão com o banco de dados
 */
const DATA_LAYER_CONFIG = [
    "driver" => "mysql", // MariaDB usa o mesmo driver do mysql
    "host" => "localhost", // O host do banco
    "port" => "3306", // A porta do banco
    "dbname" => "atende", // O nome do banco
    "username" => "root", // O username
    "passwd" => "", // A senha
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // Charset que usamos
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // se der exceção vai estar guardado aqui
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // todos os resultado do banco vem dentro de um objeto
        PDO::ATTR_CASE => PDO::CASE_NATURAL // a conexão não vai fazer conversão de caracteres
    ]
];
