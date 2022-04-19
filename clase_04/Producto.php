<?php
//código de barra (6 sifras ),nombre ,tipo, stock, precio
class Producto
{
    private $_id;
    private $_codigoDeBarras;
    private $_nombre;
    private $_tipo;
    private $_stock;
    private $_precio;

    public function __construct($codigoDeBarras, $nombre, $tipo, $stock, $precio)
    {
        if ($nombre && is_string($nombre)) 
        {
            $this->_nombre = $nombre;
        }
        if ($codigoDeBarras && is_string($codigoDeBarras)) 
        {
            $this->_codigoDeBarras = $codigoDeBarras;
        }
        if ($tipo && is_string($tipo))
        {
            $this->_tipo = $tipo;
        }
        if ($stock && is_numeric($stock))
        {
            $this->_stock = $stock;
        }
        if ($precio && is_numeric($precio))
        {
            $this->_precio = $precio;
        }
    }

    private static function get_last_id()
    {
        $filename = "productos.sequence";
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
        $filename = "productos.sequence";
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

    public function Equals($producto) 
    {
        return is_a($producto, "Producto") && $this->_codigoDeBarras == $producto->_codigoDeBarras;
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