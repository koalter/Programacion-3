<?php
include_once "Auto.php";

class Garage {
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    public function __construct($razonSocial, $precioPorHora = 100) {
        if (is_string($razonSocial)) {
            $this->_razonSocial = $razonSocial;
        }
        if (is_numeric($precioPorHora)) {
            $this->_precioPorHora = $precioPorHora;
        }

        $this->_autos = array();
    }

    public function MostrarGarage() {
        $precioPorHora = strval($this->_precioPorHora);
        $autos = "";

        foreach ($this->_autos as $auto) {
            if (is_a($auto, "Auto")) {
                $autos = $autos . Auto::MostrarAuto($auto) . "<br />";
            }
        }

        return "Razón social: " . $this->_razonSocial . "<br />" . "Precio por hora: " . $precioPorHora . "<br />" . "Autos: " . "<br />" . $autos;
    }

    public function Equals($auto) {
        if (is_a($auto, "Auto")) {
            foreach ($this->_autos as $autoEnElArray) {
                if ($auto->Equals($autoEnElArray)) {
                    return true;
                }
            }
        }
        return false;
    }

    public function Add($auto) {
        if (is_a($auto, "Auto")) {
            if (!$this->Equals($auto)) {
                $this->_autos[] = $auto;
            }
            else {
                echo 'Ese auto ya está en el garage!';
            }
        }
        else {
            echo 'Sólo se pueden agregar autos!!!';
        }
    }

    public function Remove($auto) {
        if (is_a($auto, "Auto")) {
            for ($i = 0; $i < count($this->_autos); $i++) {
                if ($auto->Equals($this->_autos[$i])) {
                    unset($this->_autos[$i]);
                    return;
                }
            }
            echo 'Ese auto no está en el garage!';
        }
        else {
            echo 'Eso que querés quitar no es un auto!!!';
        }
    }

    public static function AltaGarage($garage) {
        if (!is_a($garage, 'Garage')) {
            return null;
        }
        
        $archivo = fopen('garages.csv', 'a');
        
        if ($archivo) {
            $garageBuilder = array();
            $autoBuilder = array();

            foreach ($garage as $prop) {
                if (is_array($prop)) {
                    foreach ($prop as $auto) {
                        if (is_a($auto, "Auto")) {
                            $row = implode("|", $auto->GetPropiedades());
                            $autoBuilder[] = $row;
                        }
                    }
                    $garageBuilder[] = implode(";", $autoBuilder);
                }
                else {
                    $garageBuilder[] = $prop;
                }
            }

            # Con fwrite
            $string = implode(",", $garageBuilder) . "\n";
            fwrite($archivo, $string);

            # Con fputcsv
            // fputcsv($archivo, $garageBuilder);

            fclose($archivo);
        }
    }

    public static function LeerArchivo() { // Con fgets y explode
        $garages = array();
        
        if (file_exists('garages.csv')) {
            $archivo = fopen('garages.csv', 'r');

            while (!feof($archivo)) {
                $cursor = fgets($archivo);

				if ($cursor) {
                    $garageBuilder = explode(',', $cursor);
                    $garage = new Garage($garageBuilder[0], intval($garageBuilder[1]));
                    
                    # $garageBuilder[2] : string (es la lista de autos)
                    $stringListaDeAutos = explode(";", $garageBuilder[2]);

                    # Recorro la lista de autos del csv, descompongo cada elemento para crear un nuevo Auto y agregarlo a la lista formal de autos
                    foreach ($stringListaDeAutos as $stringAuto) {
                        $autoBuilder = explode("|", $stringAuto);
                        $garage->Add(new Auto($autoBuilder[0], $autoBuilder[1], $autoBuilder[2], $autoBuilder[3]));
                    }

                    # Finalmente añado el garage reconstruido a la lista de garages
                    $garages[] = $garage;
				}
            }
            
            fclose($archivo);
        }

        return $garages;
    }
    /*
    public static function LeerArchivo() { // Con fgetcsv
        $garages = array();
        
        if (file_exists('garages.csv')) {
            $archivo = fopen('garages.csv', 'r');

            while (!feof($archivo)) {
                $objeto = fgetcsv($archivo);
				
                if ($objeto) {
                    $garage = new Garage($objeto[0], intval($objeto[1]));
                    
                    # $objeto[2] : string (es la lista de autos)
                    $stringListaDeAutos = explode(";", strval($objeto[2]));

                    # Recorro la lista de autos del csv, descompongo cada elemento para crear un nuevo Auto y agregarlo a la lista formal de autos
                    foreach ($stringListaDeAutos as $stringAuto) {
                        $autoBuilder = explode("|", $stringAuto);
                        $garage->Add(new Auto($autoBuilder[0], $autoBuilder[1], $autoBuilder[2], $autoBuilder[3]));
                    }

                    # Finalmente añado el garage reconstruido a la lista de garages
                    $garages[] = $garage;
				}
            }
            
            fclose($archivo);
        }

        return $garages;
    }
    */
}