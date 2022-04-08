<?php
/*
Aplicación Nº 19 (Auto)

A la aplicacion 17 agregar:

Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un archivo autos.csv.

Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo autos.csv
*/
include_once 'Auto.php';

// Elimino el contenido previo del archivo para el test
if ($archivo = fopen('autos.csv', 'w')) {
    fclose($archivo);
}

$auto1 = new Auto("FIAT", "NEGRO", 79000);
$auto2 = new Auto("PEUGEOT", "ROJO");
$auto3 = new Auto("VW", "AZUL", 150000);

Auto::AltaAuto($auto1);
Auto::AltaAuto($auto2);
Auto::AltaAuto($auto3);

$autosLeidosDelArchivo = Auto::LeerArchivo();

$resultado = '';
if ($autosLeidosDelArchivo[0] == $auto1 &&
    $autosLeidosDelArchivo[1] == $auto2 &&
    $autosLeidosDelArchivo[2] == $auto3) {
    $resultado = 'TEST APROBADO!';
}
else {
    $resultado = 'TEST FALLIDO!!!';
}

echo $resultado;