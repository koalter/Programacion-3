<?php
$pedido = $_PUT['pedido'];
$email = $_PUT['email'];
$sabor = $_PUT['sabor'];
$tipo = $_PUT['tipo'];
$cantidad = $_PUT['cantidad'];
$mensaje = "Error no identificado.";

switch (Venta::ModificarVenta($pedido, $email, $sabor, $tipo, $cantidad))
{
    case -1;
        $mensaje = "El registro no existe.";
        break;
    case 0:
        $mensaje = "No se pudo modificar la venta.";
        break;
    case 1:
        $mensaje = "Venta Modificada!";
        break;
}

echo $mensaje;