<?php
/*
Crear la clase Garage que posea como atributos privados:
_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
i. La razón social.
ii. La razón social, y el precio por hora.

Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y que mostrará todos los atributos del objeto.

Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.

Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage” (sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);

Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Remove($autoUno);

En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los métodos.
*/
include_once "aplicacion_17.php";

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
}
?>