<?php
class Pizza implements JsonSerializable
{
    private int $_id;
    private string $_sabor;
    private string $_tipo;
    private float $_precio;
    private int $_cantidad;

    public function __construct(string $sabor, string $tipo = 'molde', float $precio = 1, int $cantidad = 1)
    {
        $this->_sabor = StringUtils::Standarize($sabor);
        $tipo = StringUtils::Standarize($tipo);
        if ($tipo === 'molde' || $tipo === 'piedra')
        {
            $this->_tipo = $tipo;
        }
        $this->_precio = $precio;
        $this->_cantidad = $cantidad;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public static function PizzaCarga(Pizza $pizza) 
    {
        $resultado = false;
        if (Pizza::Validar($pizza)) 
        {
            $archivo = Constants::$PIZZA_JSON_FILE;
            $listado = JsonUtils::LeerListado($archivo);
            $i = $pizza->GetIndexIn($listado);
            $isUpdate = $i >= 0;
    
            if ($isUpdate) 
            {
                $listado[$i]->_precio = $pizza->_precio;
                $listado[$i]->_cantidad += $pizza->_cantidad;
            }
            else 
            {
                $pizza->_id = Pizza::get_last_id();
                $listado[] = $pizza;
            }
            
            if (JsonUtils::ActualizarListado($listado, $archivo)) 
            {
                $resultado = true;
                if (!$isUpdate) 
                {
                    Pizza::set_id($pizza->_id + 1);
                }
            }
        }
        return $resultado;
    }

    public static function PizzaCarga_v2(Pizza $pizza) 
    {
        $resultado = false;
        if (Pizza::Validar($pizza)) 
        {
            $archivo = Constants::$PIZZA_JSON_FILE;
            $listado = JsonUtils::LeerListado($archivo);
            $i = $pizza->GetIndexIn($listado);
            $isUpdate = $i >= 0;
    
            if ($isUpdate) 
            {
                $listado[$i]->_precio = $pizza->_precio;
                $listado[$i]->_cantidad += $pizza->_cantidad;
            }
            else 
            {
                $pizza->_id = Pizza::get_last_id();
                $listado[] = $pizza;
            }
            
            if (FileUtils::GuardarArchivo('archivo', './ImagenesDePizzas', $pizza->_tipo.'+'.$pizza->_sabor, '.jpg') &&
                JsonUtils::ActualizarListado($listado, $archivo)) 
            {
                $resultado = true;
                if (!$isUpdate) 
                {
                    Pizza::set_id($pizza->_id + 1);
                }
            }
        }
        return $resultado;
    }

    public static function PizzaConsultar(string $sabor, string $tipo) 
    {
        $resultado = "No existe el sabor";
        $sabor = StringUtils::Standarize($sabor);
        $tipo = StringUtils::Standarize($tipo);
        $listado = JsonUtils::LeerListado(Constants::$PIZZA_JSON_FILE);

        foreach ($listado as $elemento) 
        {
            if ($elemento->_sabor === $sabor) 
            {
                $resultado = "No existe el tipo";
                if ($elemento->_tipo === $tipo) 
                {
                    $resultado = "Si hay";
                }
            }
        }

        return $resultado;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function Equals($pizza) 
    {
        return $pizza->_sabor === $this->_sabor && $pizza->_tipo === $this->_tipo;
    }

    public function GetIndexIn(array $listado) 
    {
        for ($i = 0; $i < count($listado); $i++)
        {
            if ($this->Equals($listado[$i])) 
            {
                return $i;
            }
        }
        return -1;
    }
    
    public static function Validar(Pizza $pizza) 
    {
        return $pizza != null &&
        StringUtils::IsNullOrWhitespace($pizza->_sabor) == false &&
        StringUtils::IsNullOrWhitespace($pizza->_tipo) == false &&
        $pizza->_precio >= 1 &&
        $pizza->_cantidad >= 1;
    }

    private static function get_last_id()
    {
        $filename = Constants::$PIZZA_SEQUENCE_FILE;
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

    private static function set_id(int $id)
    {
        $filename = Constants::$PIZZA_SEQUENCE_FILE;
        $resultado = false;
        $fp = fopen($filename, "w");

        if ($fp)
        {
            if (fwrite($fp, strval($id)))
            {
                $resultado = true;
            }
            fclose($fp);
        }

        return $resultado;
    }
}