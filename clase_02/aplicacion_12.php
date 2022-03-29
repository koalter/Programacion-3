<?php
/*
Aplicación No 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/

$palabra = array("H", "O", "L", "A");
echo implode(InvertirPalabra($palabra));

function InvertirPalabra($arrayDeCaracteres) {
    $palabraInvertida = [];

    foreach ($arrayDeCaracteres as $letra) {
        array_unshift($palabraInvertida, $letra);
    }

    return $palabraInvertida;
}
?>