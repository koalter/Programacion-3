<?php
class Usuario
{
    private $_nombre;
    private $_clave;
    private $_mail;

    public function __construct($nombre, $clave, $mail)
    {
        if ($nombre && is_string($nombre)) 
        {
            $this->_nombre = $nombre;
        }
        if ($clave && is_string($clave)) 
        {
            $this->_clave = $clave;
        }
        if ($mail && is_string($mail))
        {
            $this->_mail = $mail;
        }
    }

    public function Equals($usuario) 
    {
        return is_a($usuario, "Usuario") && $this->_mail == $usuario->_mail;
    }

    public static function AltaUsuario($usuario)
    {
        $usuariosExistentes = Usuario::LeerArchivo();
        $archivo = fopen("usuarios.csv", "a");
        $retorno = 0;
        
        if (!is_a($usuario, "Usuario") || !$archivo)
        {
            return -1;
        }

        foreach ($usuariosExistentes as $item) 
        {
            if ($usuario->Equals($item))
            {
                return 0;
            }
        }
        
        if (fputcsv($archivo, get_object_vars($usuario)))
        {
            $retorno = 1;
        }

        fclose($archivo);
        return $retorno;
    }

    public static function LeerArchivo() 
    {
        $usuarios = array();
        
        if (file_exists('usuarios.csv')) 
        {
            $archivo = fopen('usuarios.csv', 'r');

            while (!feof($archivo)) 
            {
                $objeto = fgetcsv($archivo);
				
                if ($objeto) 
                {
                    $usuario = new Usuario($objeto[0], $objeto[1], $objeto[2]);
                    $usuarios[] = $usuario;
				}
            }
            
            fclose($archivo);
        }

        return $usuarios;
    }

    public static function ListarUsuarios($usuarios) 
    {
        if ($usuarios != null && is_array($usuarios) && count($usuarios) > 0) 
        {
            $stringBuilder = array("<ul>");
            foreach ($usuarios as $usuario) 
            {
                if (is_a($usuario, "Usuario")) 
                {
                    $stringBuilder[] = "<li>" . implode(", ", get_object_vars($usuario)) . "</li>";
                }
            }
            $stringBuilder[] = "</ul>";

            return implode($stringBuilder);
        }
        return null;
    }

    public function VerificarUsuario($listadoDeUsuarios)
    {
        if (is_array($listadoDeUsuarios))
        {
            foreach ($listadoDeUsuarios as $usuario)
            {
                if ($this->Equals($usuario))
                {
                    if ($this->_clave == $usuario->_clave)
                    {
                        return 1;
                    }
    
                    return 0;
                }
            }
        }

        return -1;
    }
}