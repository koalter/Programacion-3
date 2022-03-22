# Programacion III
## Este repositorio contiene apuntes de PHP y ejercicios realizados en la cursada de Programación 3 de la UTN-FRA

### GDB online Debugger (para entregar trabajos)
https://www.onlinegdb.com/

`var_dump($var)`
Genera por salida el contenido de la variable

### Creación de arrays:
    $arr = array(1, 2, 3);
    $arr = [1, 2, 3];
    $arr[0] = 1; $arr[1] = 2; $arr[2] = 3;
Los arrays pueden ser multidatos como en JS

Tambien pueden llevar una estructura de clave=>valor:
    $vec = array("Juan"=>22,"Romina"=>12,"Uriel"=>8);
    $vec["Hugo"]=15; $vec["Juana"]= 36;

### foreach
    $arr = array(1, 2, 3);
    foreach ($arr as $item) {
        echo $item;
    }

    $vec = array("uno" => 1, "dos" => 2, "tres" => 3);
    foreach($vec as $k => $valor) {
        //$k posee la clave y $valor el elemento
    }

### Funciones para cadenas
* `strlen()` Retorna la cantidad de caracteres de una cadena.
* `strcmp()` Compara dos cadenas (case sensitive).
* `strtolower()` Convierte una cadena a minúsculas.
* `strtoupper()` Convierte una cadena a mayúsculas.
* `substr()` Retorna una porción de la cadena.
* `ucfirst()` Convierte el primer carácter de la cadena a mayúscula.
* `ucwords()` Convierte el primer carácter de cada palabra de la cadena en mayúsculas.

### Funciones para ordenar arreglos
* sort() Ordena un array ascendentemente
* rsort() Ordena un array descendentemente
* asort() Ordena un array asociativo ascendentemente, por su valor.
* ksort() Ordena un array asociativo ascendentemente, por su clave.
* arsort() Ordena un array asociativo descendentemente, por su valor.
* krsort() Ordena un array asociativo descendentemente, por su clave.