<?php

require_once __DIR__."/../../vendor/autoload.php";

use App\Model\ModelSenha;

$senhas = (new ModelSenha())->listFilteredPasswords();

var_dump($senhas);
