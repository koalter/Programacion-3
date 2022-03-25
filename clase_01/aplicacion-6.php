<?php
/*
Aplicación Nº 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el resultado.
*/

$lista = array(rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10));
$suma = 0;

foreach ($lista as $numero) {
    $suma += $numero;
    echo $numero . '<br />';
}

$promedio = $suma / 6;

if ($promedio < 6) {
    $mensaje = 'El promedio es menor a 6';
}
else if ($promedio > 6) {
    $mensaje = 'El promedio es mayor a 6';
}
else {
    $mensaje = 'El promedio es igual a 6';
}

echo $mensaje;

?>