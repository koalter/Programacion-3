<?php
/*
Aplicación No 17 (Auto)
Realizar una clase llamada “Auto” que posea los siguientes atributos privados:

_color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);

En testAuto.php:
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
● Crear un objeto “Auto” utilizando la sobrecarga restante.
● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)
*/

class Auto {
    private $_color;
    private $_precio;
    private $_marca;
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
        if ($fecha != null && is_a($fecha, "DateTime")){
            $this->_fecha = $fecha;
        } else {
            $this->_fecha = date_create();
        }
    }

    public function AgregarImpuestos($impuestos) {
        if ($impuestos > 0) {
            $this->_precio += $impuestos;
        }
    }

    public static function MostrarAuto($auto) {
        if (is_a($auto, "Auto")) {
            return "Marca: ".$auto->_marca.", Color: ".$auto->_color.", Precio: ".$auto->_precio.", Fecha: ".$auto->_fecha->format("d/m/y");
        }
    }

    public function Equals($auto) {
        return is_a($auto, "Auto") 
            && $this->_marca == $auto->_marca;
    }

    public static function Add($auto1, $auto2) {
        if (is_a($auto1, "Auto")
            && $auto1->Equals($auto2) && $auto1->_color && $auto2->_color) {
            return $auto1->_precio + $auto2->_precio;
        }
        echo "Los autos no son iguales";
        return 0;
    }
}
?>