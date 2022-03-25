<?php
/*
Aplicación Nº 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $num , pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
*/

$num = 43;
$mensaje = "Ingresa un número entre 20 y 60";

if ($num == 20) {
    $mensaje = "veinte";
}
else if ($num >= 21 && $num <= 29) {
    $mensaje = "veinti";
    $num -= 20;
    switch ($num) {
        case 1:
            $mensaje = $mensaje . "uno";
            break;
        case 2:
            $mensaje = $mensaje . "dos";
            break;
        case 3:
            $mensaje = $mensaje . "tres";
            break;
        case 4:
            $mensaje = $mensaje . "cuatro";
            break;
        case 5:
            $mensaje = $mensaje . "cinco";
            break;
        case 6:
            $mensaje = $mensaje . "seis";
            break;
        case 7:
            $mensaje = $mensaje . "siete";
            break;
        case 8:
            $mensaje = $mensaje . "ocho";
            break;
        case 9:
            $mensaje = $mensaje . "nueve";
            break;
    }
}
else if ($num >= 30 && $num <= 59) {
    if ($num >= 30 && $num <= 39) {
        $mensaje = "treinta";
        $num -= 30;
    }
    else if ($num >= 40 && $num <= 49) {
        $mensaje = "cuarenta";
        $num -= 40;
    }
    else if ($num >= 50 && $num <= 59) {
        $mensaje = "cincuenta";
        $num -= 50;
    }
    
    switch ($num) {
        case 1:
            $mensaje = $mensaje . " y uno";
            break;
        case 2:
            $mensaje = $mensaje . " y dos";
            break;
        case 3:
            $mensaje = $mensaje . " y tres";
            break;
        case 4:
            $mensaje = $mensaje . " y cuatro";
            break;
        case 5:
            $mensaje = $mensaje . " y cinco";
            break;
        case 6:
            $mensaje = $mensaje . " y seis";
            break;
        case 7:
            $mensaje = $mensaje . " y siete";
            break;
        case 8:
            $mensaje = $mensaje . " y ocho";
            break;
        case 9:
            $mensaje = $mensaje . " y nueve";
            break;
    }
}
else if ($num == 60) {
    $mensaje = "sesenta";
}

echo $mensaje;

?>