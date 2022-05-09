<?php
$pedido = $_DELETE['pedido'];
$mensaje = "No se pudo borrar la venta.";

if (Venta::BorrarVenta($pedido))
{
    $mensaje = "Se borró la venta.";
}

echo $mensaje;