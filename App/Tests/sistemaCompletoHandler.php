<?php 

if (!empty($_POST['pegarSenha'])) {
    $password = '';
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    
    for ($i = 0; $i < 8; $i++) {
        $password .= $chars[rand(0, strlen($chars) - 1)];
    }
    
    echo "<h1>".$password."</h1>";
    echo "<h2>Pega sua senha e venha até às coordenadas: <br>". "9° 44' 52'' S37° 26' 13'' O
    " ."</h2>";    
} else {
    echo "<h1>Feito por Wendson da Silva Arembepiano.</h1>";
}

