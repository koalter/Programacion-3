<?php
/*Aplicación No 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.*/

echo date("Y/m/d");
echo "<br />";
echo date("F j, Y");
echo "<br />";
echo date("d/m/Y");
echo "<br />";
echo "<br />";

$fecha = (int) date("d");
$mes = (int) date("m");

if ($mes == 3 && $fecha >= 21 || $mes == 4 || $mes == 5 || $mes == 6 && $fecha <= 20) {
    $estacion = "otoño";
}
else if ($mes == 6 && $fecha >= 21 || $mes == 7 || $mes == 8 || $mes == 9 && $fecha <= 20) {
    $estacion = "invierno";
}
else if ($mes == 9 && $fecha >= 21 || $mes == 10 || $mes == 11 || $mes == 12 && $fecha <= 20) {
    $estacion = "primavera";
}
else if ($mes == 12 && $fecha >= 21 || $mes == 1 || $mes == 2 || $mes == 3 && $fecha <= 20) {
    $estacion = "verano";
}

echo "Estamos en " . $estacion;

?>