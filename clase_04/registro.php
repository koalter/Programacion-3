<?php
/*
Aplicación No 23 (Registro JSON)
Archivo: registro.php
método:POST
Recbe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un dato
con la fecha de registro , toma todos los datos y utilizar sus métodos para poder hacer
el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.i
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario.
*/
require_once "Usuario.php";

$resultado = "NO SE PUDO DAR DE ALTA AL USUARIO!!!";
$nombre = $_POST["nombre"];
$clave = $_POST["clave"];
$mail = $_POST["mail"];
$foto = $_FILES["foto"];

$usuario = new Usuario($nombre, $clave, $mail, $foto["name"]);

switch ($usuario->AltaUsuarioJson())
{
    case -1:
        $resultado = "ERROR EN EL ARCHIVO!!!";
        break;
    case 0:
        $resultado = "EL USUARIO YA EXISTE!!!";
        break;
    case 1:
        $resultado = "USUARIO DADO DE ALTA";
        if (!$usuario->SubirFoto($foto))
        {
            $resultado .= "<br>ERROR AL SUBIR LA FOTO!!!";
        }
        break;
}

echo $resultado;