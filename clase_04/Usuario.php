<?php
class Usuario
{
    private $_id;
    private $_nombre;
    private $_clave;
    private $_mail;
    private $_foto;
    private $_fechaAlta;

    public function __construct($nombre, $clave, $mail, $foto = null)
    {
        if ($nombre && is_string($nombre)) 
        {
            $this->_nombre = $nombre;
        }
        if ($clave && is_string($clave)) 
        {
            $this->_clave = base64_encode($clave);
        }
        if ($mail && is_string($mail))
        {
            $this->_mail = $mail;
        }
        if ($foto && is_string($foto))
        {
            $this->_foto = $foto;
        }
    }

    public function Equals($usuario) 
    {
        return is_a($usuario, "Usuario") && $this->_mail == $usuario->_mail;
    }

    #region Funciones de archivos CSV
    public function AltaUsuarioCsv()
    {
        $usuariosExistentes = Usuario::LeerArchivoCsv();
        $retorno = -1;
        
        if ($this->ExisteEn($usuariosExistentes))
        {
            return 0;
        }
        
        $archivo = fopen("usuarios.csv", "a");
        if ($archivo)
        {
            if (fputcsv($archivo, get_object_vars($this)))
            {
                $retorno = 1;
            }
        }

        fclose($archivo);
        return $retorno;
    }

    public static function LeerArchivoCsv() 
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
    #endregion

    #region Funciones de archivos JSON
    public function AltaUsuarioJson()
    {
        $usuariosExistentes = Usuario::LeerArchivoJson();
        $resultado = -1;

        if ($this->ExisteEn($usuariosExistentes))
        {
            return 0;
        }
        
        $this->_id = Usuario::get_last_id();
        $this->_fechaAlta = date_create()->format('d/m/Y H:i:s');
        $usuariosExistentes[] = $this;
        
        $json = Usuario::to_json_array($usuariosExistentes);
        
        $archivo = fopen("usuarios.json", "w");
        if ($archivo)
        {
            if (fwrite($archivo, $json))
            {
                Usuario::set_id($this->_id + 1);
                $resultado = 1;
            }
        }
        
        fclose($archivo);
        return $resultado;
    }

    public static function LeerArchivoJson() 
    {
        $filename = "usuarios.json";
        if (file_exists($filename))
        {
            $archivo = fopen($filename, "r");
            
            if ($archivo)
            {
                $texto = fread($archivo, filesize($filename));
                fclose($archivo);

                if ($texto)
                {
                    return json_decode($texto);
                }
            }
        }
            
        return array();
    }

    private static function to_json_array($array)
    {
        $data = "[";
            for ($i = 0; $i < count($array); $i++)
            {
                if ($i > 0)
                {
                    $data .= ",\r\n";
                }
                
                $object = get_object_vars($array[$i]);
                $data .= json_encode($object, JSON_UNESCAPED_SLASHES);
            }
        $data .= "]";
    
        return $data;
    }

    private static function get_last_id()
    {
        $filename = "usuarios.sequence";
        if (file_exists($filename))
        {
            $fp = fopen($filename, "r");
    
            if ($fp)
            {
                $result = fread($fp, filesize($filename) || 1);
                fclose($fp);
                if (is_numeric($result))
                {
                    return (int)$result;
                }
            }
        }

        return 1;
    }

    private static function set_id($id)
    {
        $filename = "usuarios.sequence";
        $success = false;
        $fp = fopen($filename, "w");

        if ($fp && is_numeric($id))
        {
            if (fwrite($fp, strval($id)))
            {
                $success = true;
            }
            fclose($fp);
        }

        return $success;
    }
    #endregion

    public function SubirFoto($referencia)
    {
        $resultado = false;
        if (is_array($referencia) && $referencia["name"] != null && $referencia["tmp_name"] != null)
        {
            $destino = "./Usuario/Fotos/";
            if (!file_exists($destino)) mkdir($destino, 0777, true);
            $resultado = move_uploaded_file($referencia["tmp_name"], $destino.$referencia["name"]);
        }
        return $resultado;
    }

    // Para deprecar
    public static function ListarUsuarios($usuarios) 
    {
        if ($usuarios != null && is_array($usuarios) && count($usuarios) > 0) 
        {
            $stringBuilder = array("<ul>");
            foreach ($usuarios as $usuario) 
            {
                $stringBuilder[] = "<li>" . implode(", ", get_object_vars($usuario)) . "</li>";
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

    public function ExisteEn($array)
    {
        $existe = false;

        foreach ($array as $item)
        {
            if ($this->Equals(new Usuario($item->_nombre, $item->_clave, $item->_mail)))
            {
                $existe = true;
            }
        }

        return $existe;
    }
}