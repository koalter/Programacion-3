<?php
$usuario = $_GET["usuario"];
$sabor = $_GET["sabor"];
$from = date_create_from_format("d-m-Y", $_GET["desde"]);
$to = date_create_from_format("d-m-Y", $_GET["hasta"]);

echo "a- la cantidad de pizzas vendidas \n" . Venta::GetCantidadPizzasVendidas() . "\n\n";
echo "b- el listado de ventas entre dos fechas ordenado por sabor \n" . Venta::GetVentasPorFechas($from, $to) . "\n\n";
echo "c- el listado de ventas de un usuario ingresado \n" . Venta::GetVentasPorUsuario($usuario) . "\n\n";
echo "d- el listado de ventas de un sabor ingresado \n" . Venta::GetVentasPorSabor($sabor) . "\n\n";

