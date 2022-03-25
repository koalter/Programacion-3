<?php
/*
Aplicación Nº 10 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.
*/

$asociativo = array(
    'azul'  => new_lapicera('azul', 'bic', 'comun', 10),
    'verde' => new_lapicera('verde', 'simball', 'comun', 15),
    'rojo'  => new_lapicera('rojo', 'bic', 'fino', 12)
);

$indexado = array(
    new_lapicera('azul', 'bic', 'fino', 12), 
    new_lapicera('rojo', 'simball', 'comun', 15), 
    new_lapicera('negro', 'pepe', 'grueso', 8)
);

echo '<p>Array asociativo:</p>';
echo lapicera_toString($asociativo['azul']) . '<br />';
echo lapicera_toString($asociativo['verde']) . '<br />';
echo lapicera_toString($asociativo['rojo']) . '<br />';

echo '<p>Array indexado:</p>';
echo lapicera_toString($indexado[0]) . '<br />';
echo lapicera_toString($indexado[1]) . '<br />';
echo lapicera_toString($indexado[2]) . '<br />';

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