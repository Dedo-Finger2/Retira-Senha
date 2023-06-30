<?php

/**
 * Testando como eu faria para pegar o RG do usuário logado
 */

require __DIR__."/../../vendor/autoload.php"; // Autoload

use App\Model\ModelCadastro;

$email = "antonio.neto12@ba.estudante.senai.br";

$rg = (new ModelCadastro())->find("email = '{$email}'")->fetch();

var_dump($rg->rg);