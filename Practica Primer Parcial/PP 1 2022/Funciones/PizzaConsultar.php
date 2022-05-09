<?php
$sabor = $_POST['sabor'];
$tipo = $_POST['tipo'];

echo Pizza::PizzaConsultar($sabor, $tipo);