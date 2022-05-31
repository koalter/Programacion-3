<?php
$sabor = $_GET['sabor'];
$precio = $_GET['precio'];
$tipo = $_GET['tipo'];
$cantidad = $_GET['cantidad'];
$mensaje = 'Error en la carga de pizza!';

$pizza = new Pizza($sabor, $tipo, $precio, $cantidad);

if (Pizza::PizzaCarga($pizza)) 
{
    $mensaje = 'Pizza cargada!';
}

echo $mensaje;