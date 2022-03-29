<?php
include_once "aplicacion_17.php";

$auto1 = new Auto("FIAT", "AZUL");
$auto2 = new Auto("FIAT", "ROJO");

$auto3 = new Auto("PEUGEOT", "NEGRO", 149999.99);
$auto4 = new Auto("PEUGEOT", "NEGRO", 120000);

$auto5 = new Auto("VOLKSWAGEN", "BLANCO", 80000, date_create("10/03/1997"));

$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);

echo "<p>".Auto::Add($auto1, $auto2)."</p>";

if ($auto1->Equals($auto2)) {
    echo "<p>Auto1 y Auto2 son iguales</p>";
}
else {
    echo "<p>Auto1 y Auto2 son distintos</p>";
}

if ($auto1->Equals($auto5)) {
    echo "<p>Auto1 y Auto5 son iguales</p>";
}
else {
    echo "<p>Auto1 y Auto5 son distintos</p>";
}

echo Auto::MostrarAuto($auto1)."<br />";
echo Auto::MostrarAuto($auto3)."<br />";
echo Auto::MostrarAuto($auto5)."<br />";
?>