<?php

/**
 * Testando a filtragem das senhas
 */

require_once __DIR__."/../../vendor/autoload.php"; // Autoload

use App\Model\ModelSenha;

$senhas = (new ModelSenha())->listFilteredPasswords();

var_dump($senhas);
