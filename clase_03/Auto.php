<?php
class Auto {
    private $_marca;
    private $_color;
    private $_precio;
    private $_fecha;

    public function __construct($marca, $color, $precio = 0, $fecha = null) {
        if (is_string($marca)) {
            $this->_marca = $marca;
        }
        if (is_string($color)) {
            $this->_color = $color;
        }
        if (is_numeric($precio)) {
            $this->_precio = $precio;
        }
        if ($fecha != null) {
            if (is_a($fecha, 'DateTime')) {
                $this->_fecha = $fecha->format('d/m/y');
            }
            else if (is_string($fecha)) {
                $this->_fecha = $fecha;
            }
        } else {
            $this->_fecha = date_create()->format('d/m/y');
        }
    }

    public function AgregarImpuestos($impuestos) {
        if ($impuestos > 0) {
            $this->_precio += $impuestos;
        }
    }

    public static function MostrarAuto($auto) {
        if (is_a($auto, 'Auto')) {
            return 'Marca: '.$auto->_marca.', Color: '.$auto->_color.', Precio: '.$auto->_precio.', Fecha: '.$auto->_fecha;
        }
    }

    public function Equals($auto) {
        return is_a($auto, 'Auto') 
            && $this->_marca == $auto->_marca;
    }

    public static function Add($auto1, $auto2) {
        if (is_a($auto1, 'Auto')
            && $auto1->Equals($auto2) && $auto1->_color && $auto2->_color) {
            return $auto1->_precio + $auto2->_precio;
        }
        echo 'Los autos no son iguales';
        return 0;
    }

    public static function AltaAuto($auto) {
        if (!is_a($auto, 'Auto')) {
            return null;
        }
        
        $archivo = fopen('autos.csv', 'a');
        
        if ($archivo) {
            # Con fwrite e implode
            fwrite($archivo, implode(',', get_object_vars($auto)) . "\n");
            # con fputcsv
            // fputcsv($archivo, get_object_vars($auto));
            fclose($archivo);
        }
    }
    
    public static function LeerArchivo() { // con fgets y explode
        $autos = array();

        if (file_exists('autos.csv')) {
            $archivo = fopen('autos.csv', 'r');
            
            while (!feof($archivo)) {
                $cursor = fgets($archivo);
				if ($cursor) {
					$objeto = explode(',', $cursor);
					$autos[] = new Auto($objeto[0], $objeto[1], $objeto[2], $objeto[3]);
				}
            }

            fclose($archivo);
        }

        return $autos;
    }
    /*
    public static function LeerArchivo() { // con fgetcsv
        $autos = array();

        if (file_exists('autos.csv')) {
            $archivo = fopen('autos.csv', 'r');
            
            while (!feof($archivo)) {
                $objeto = fgetcsv($archivo);
                if ($objeto) {
					$autos[] = new Auto($objeto[0], $objeto[1], $objeto[2], $objeto[3]);
				}
            }

            fclose($archivo);
        }

        return $autos;
    }
    */
    public function GetPropiedades() {
        return get_object_vars($this);
    }
}