<?php
/*
Aplicación Nº 27 (Registro BD)
Archivo: registro.php
método:POST
Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST ,
crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
guardando los datos la base de datos
retorna si se pudo agregar o no.
*/
require_once "Usuario.php";

$resultado = "NO SE PUDO DAR DE ALTA AL USUARIO!!!";
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$clave = $_POST["clave"];
$mail = $_POST["mail"];
$localidad = $_POST["localidad"];

$usuario = new Usuario($nombre, $apellido, $clave, $mail, $localidad);

if ($usuario->AltaUsuarioBD())
{
    $resultado = "USUARIO DADO DE ALTA";
}

echo $resultado;