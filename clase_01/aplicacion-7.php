<?php
/*
Aplicación Nº 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for ) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/> ). Repetir la impresión de los números utilizando
las estructuras while y foreach .
*/

$lista = array();

// Cargo el array
for ($i = 1; count($lista) < 10; $i++) {
    if ($i % 2 == 1) {
        array_push($lista, $i);
    }
}

// Leo e imprimo por pantalla los elementos del array
echo '<p>Estructura for</p>';
for ($i = 0; $i < count($lista); $i++) {
    echo $lista[$i] . '<br />';
}

// con estructura while
echo '<p>Estructura while</p>';
$i = 0;
while ($i < count($lista)) {
    echo $lista[$i] . '<br />';
    $i++;
}

// con estructura foreach
echo '<p>Estructura foreach</p>';
foreach ($lista as $item) {
    echo $item . '<br />';
}
?>