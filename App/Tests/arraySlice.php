<?php

$dias_semana = array("segunda", "terça", "quarta", "quinta", "sexta", "sábado", "domingo");

// Suponha que os checkboxes foram marcados para "segunda", "terça", "quarta" e "quinta"
$selecionados = array("segunda", "terça", "quarta");

if (count($selecionados) == 2) {
  $string = implode(" E ", $selecionados);
} elseif (count($selecionados) == 3) {
  $string = implode(", ", array_slice($selecionados, 0, -1)) . " E " . end($selecionados);
} else {
  $ultimo_dia = array_pop($selecionados);
  $string = implode(", ", $selecionados) . " E " . $ultimo_dia;
}

echo $string;
