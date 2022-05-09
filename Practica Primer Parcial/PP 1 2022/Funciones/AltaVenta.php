<?php
$mensaje = "No se pudo registrar la venta.";
$email = $_POST["email"];
$sabor = $_POST["sabor"];
$tipo = $_POST["tipo"];
$cantidad = $_POST["cantidad"];

if (Venta::AltaVenta($email, $sabor, $tipo, $cantidad)) 
{
    $mensaje = "Venta registrada.";
}

echo $mensaje;