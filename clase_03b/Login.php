<?php
/*
Aplicación Nº 22 ( Login)
Archivo: Login.php
método:POST
Recibe los datos del usuario(clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado,
Retorna un :
“Verificado” si el usuario existe y coincide la clave también.
“Error en los datos” si esta mal la clave.
“Usuario no registrado si no coincide el mail“
Hacer los métodos necesarios en la clase usuario
*/
include_once "Usuario.php";

$listaDeUsuarios = Usuario::LeerArchivo();
$ingresante = new Usuario("loginUser", $_POST["clave"], $_POST["mail"]);
$resultado = "ERROR NO MANEJADO";

switch ($ingresante->VerificarUsuario($listaDeUsuarios))
{
    case 1:
        $resultado = "Verificado";
        break;
    case 0:
        $resultado = "Error en los datos";
        break;
    case -1:
        $resultado = "Usuario no registrado";
        break;
}

echo $resultado;