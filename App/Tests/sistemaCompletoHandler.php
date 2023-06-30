<?php 

/**
 * Sistema inteiro em dois arquivos
 */

if (!empty($_POST['pegarSenha'])) {
    $senha = '';
    $letras = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    
    for ($i = 0; $i < 8; $i++) {
        $senha .= $letras[rand(0, strlen($letras) - 1)];
    }
    
    echo "<h1>".$senha."</h1>";
    echo "<h2>Pega sua senha e venha até às coordenadas: <br>". "9° 44' 52'' S37° 26' 13'' O
    " ."</h2>";    
} else {
    echo "<h1>Feito por Wendson da Silva Arembepiano.</h1>";
}

