<?php
/*Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.*/

$numero = 1;

for ($i = 2; $numero + $i <= 1000; $i++) {
    echo $numero . " + " . $i . "<br />";
    $numero = $numero + $i;
}

echo "Se sumaron en total " . $i . " numeros";
?>
