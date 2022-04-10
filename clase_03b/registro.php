<?php
/*
Aplicación Nº 20 (Registro CSV)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario
*/
include_once "Usuario.php";

$resultado = "NO SE PUDO DAR DE ALTA AL USUARIO!!!";
$nombre = $_POST["nombre"];
$clave = $_POST["clave"];
$mail = $_POST["mail"];


$usuario = new Usuario($nombre, $clave, $mail);

switch (Usuario::AltaUsuario($usuario))
{
    case -1:
        $resultado = "ERROR EN EL ARCHIVO!!!";
        break;
    case 0:
        $resultado = "EL USUARIO YA EXISTE!!!";
        break;
    case 1:
        $resultado = "USUARIO DADO DE ALTA";
        break;
}

echo $resultado;