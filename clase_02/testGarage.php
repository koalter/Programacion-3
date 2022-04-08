<?php
include_once "aplicacion_17.php";
include_once "aplicacion_18.php";

$garage = new Garage("Auto Estop");

$auto1 = new Auto("FIAT", "AZUL");
$auto2 = new Auto("PEUGEOT", "ROJO");
$auto3 = new Auto("VOLKSWAGEN", "BLANCO");

echo "ANTES <br />" . $garage->MostrarGarage() . "<br />";

$garage->Add($auto1);
$garage->Add($auto2);
$garage->Add($auto3);

echo "AGREGO 3 AUTOS <br />" . $garage->MostrarGarage() . "<br />";

$garage->Remove(new Auto("FIAT", "NEGRO"));

echo "ELIMINO UN AUTO Y ME QUEDAN 2 <br />" . $garage->MostrarGarage() . "<br />";
?>