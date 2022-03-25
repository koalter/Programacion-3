<?php
/*
Aplicación Nº 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’ , ‘marca’ , ‘trazo’ y ‘precio’ . Crear, cargar y mostrar tres
lapiceras.
*/

$lapicera1 = new_lapicera('azul', 'bic', 'comun', 10);
$lapicera2 = new_lapicera('verde', 'simball', 'comun', 15);
$lapicera3 = new_lapicera('rojo', 'bic', 'fino', 12);

echo lapicera_toString($lapicera1) . '<br />';
echo lapicera_toString($lapicera2) . '<br />';
echo lapicera_toString($lapicera3) . '<br />';

// Funciones
function new_lapicera($color, $marca, $trazo, $precio) {
    $lapicera = array(
        'color' => $color,
        'marca' => $marca,
        'trazo' => $trazo,
        'precio' => $precio
    );

    return $lapicera;
}

function lapicera_toString($lapicera) {
    if ($lapicera['color'] && $lapicera['marca'] && $lapicera['trazo'] && $lapicera['precio']) {
        return 'Color: ' . $lapicera['color'] . ', marca: ' . $lapicera['marca'] . ', trazo: ' . $lapicera['trazo'] . ', precio: ' . $lapicera['precio'];
    }
}
?>