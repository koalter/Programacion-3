<?php
$sabor = $_POST['sabor'];
$precio = $_POST['precio'];
$tipo = $_POST['tipo'];
$cantidad = $_POST['cantidad'];
$mensaje = 'Error en la carga de pizza!';

$pizza = new Pizza($sabor, $tipo, $precio, $cantidad);

if (Pizza::PizzaCarga_v2($pizza)) 
{
    $mensaje = 'Pizza cargada!';
}

echo $mensaje;