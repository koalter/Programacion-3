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

$fecha = (int) date("m");

// Rehacer ya que falta tener en cuenta el dia
switch ($fecha) {
    case 3:
    case 4:
    case 5:
        $estacion = "otoño";
        break;
    case 6:
    case 7:
    case 8:
        $estacion = "invierno";
        break;
    case 9:
    case 10:
    case 11:
        $estacion = "primavera";
        break;
    case 12:
    case 1:
    case 2:
        $estacion = "verano";
        break;
}

echo "Estamos en " . $estacion;

?>