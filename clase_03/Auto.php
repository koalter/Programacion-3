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
        if ($fecha != null && is_a($fecha, 'DateTime')){
            $this->_fecha = $fecha->format('d/m/y');
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

    public static function LeerArchivo() {
        $autos = array();

        if (file_exists('autos.csv')) {
            $archivo = fopen('autos.csv', 'r');
            
            # Con fgets + explode
            // con fgetcsv
            while (!feof($archivo)) {
                $cursor = fgets($archivo); #
                // $objeto = fgetcsv($archivo); //
				if ($cursor) { #
                // if ($objeto) { //
					$objeto = explode(',', $cursor); #
					$autos[] = new Auto($objeto[0], $objeto[1], $objeto[2], $objeto[3]);
				}
            }

            fclose($archivo);
        }

        return $autos;
    }
}