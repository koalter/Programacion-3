<?php
/*
Aplicación Nº 20 (Garage)

A la aplicacion 18 agregar:

Crear un método de clase para poder hacer el alta de un Garage y, guardando los datos en un archivo garages.csv.
Hacer los métodos necesarios en la clase Garage para poder leer el listado desde el archivo garage.csv
Se deben cargar los datos en un array de garage.
*/
include_once "Auto.php";
include_once "Garage.php";

// Elimino el contenido previo del archivo para el test
if ($archivo = fopen("garages.csv", "w")) {
    fclose($archivo);
}

$auto1 = new Auto("FIAT", "NEGRO", 79000);
$auto2 = new Auto("PEUGEOT", "ROJO");
$auto3 = new Auto("VW", "AZUL", 150000);
$auto4 = new Auto("CHEVY", "GRIS", 199999);
$auto5 = new Auto("FORD", "ROSA");

$garage1 = new Garage("Estacionamiento Cea", 215);
$garage2 = new Garage("Estacionamiento Ko", 219.99);

$garage1->Add($auto1);
$garage1->Add($auto2);
$garage1->Add($auto3);

$garage2->Add($auto4);
$garage2->Add($auto5);

Garage::AltaGarage($garage1);
Garage::AltaGarage($garage2);

$garagesLeidosDelArchivo = Garage::LeerArchivo();
$resultado = "";

if ($garagesLeidosDelArchivo[0]->Equals($auto1) &&
    $garagesLeidosDelArchivo[0]->Equals($auto2) &&
    $garagesLeidosDelArchivo[0]->Equals($auto3) &&
    $garagesLeidosDelArchivo[1]->Equals($auto4) &&
    $garagesLeidosDelArchivo[1]->Equals($auto5)) {
    $resultado = 'TEST APROBADO!';
}
else {
    $resultado = 'TEST FALLIDO!!!';
}

echo $resultado . '<br/><br/>';

foreach ($garagesLeidosDelArchivo as $garage) {
    echo $garage->MostrarGarage() . '<br/>';
}