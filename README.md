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
* `sort()` Ordena un array ascendentemente
* `rsort()` Ordena un array descendentemente
* `asort()` Ordena un array asociativo ascendentemente, por su valor.
* `ksort()` Ordena un array asociativo ascendentemente, por su clave.
* `arsort()` Ordena un array asociativo descendentemente, por su valor.
* `krsort()` Ordena un array asociativo descendentemente, por su clave.

### Funciones: Cómo escribirlas
* Las funciones pueden recibir parámetros
        function NombreFuncion($par_1, $par_2, $par_n) {
            //código
        }
* Las funciones pueden retornar valores
        function NombreFuncion() {
            return $valor;
        }
* Los parámetros pueden tener valores por defecto

        function NombreFuncion($par_1, $par_2 = "valor") {
            //codigo
        }

### Incluir archivos en PHP (declaraciones include/require)
Ambas declaraciones `include` y `require` son idénticas, excepto en caso de falla
* `require` producirá un error fatal (E_COMPILE_ERROR) y frenará el script.
* `include` sólo producirá una advertencia (E_WARNING) y el script continuará.

Las declaraciones `include_once`/`require_once` sólo incluye/requiere una vez el archivo solicitado.

## Programación Orientada a Objetos (POO)
### Clases
La sintaxis básica para declara una **Clase** y sus miembros (atributos-métodos) en PHP.  
        
        class NombreClase {
            *Atributos (private - protected - public/var - static)*
            [Modificadores] $nombreAtributo;
            *Métodos (private - protected - public/var - static)*
            [Modificadores] function NombreMetodo([parametros]) {
                ...
            }
        }

        class NombreClase {
            *Atributos*
            private $_attr1;
            protected $_attr2;

            *Constructor*
            public function __construct(); {
                *codigo*
            }

            *Métodos*
            private function Func1($param) { *codigo* }
            protected function Func2() { *codigo* }
            public function Func3() { *codigo* }
        }

#### Clases - $this
La sintaxis para acceder a un *atributo* o *método* de una instancia de PHP.

    class ClaseBase {
        public function __construct($id, $nombre) {
            // Inicializar variables aquí
            if ($this->validar($id)) {
                $this->id = $id;
                $this->nombre = $nombre;
            }
        }

        public function validar($id) {
            // Realiza una validación
        }
    }

#### Clases - Herencia
En PHP se indica herencia a partir de *extends*

    class ClaseBase {
        public function __construct() {
            // Inicializar variables aqui
        }
    }
    class ClaseDerivada extends ClaseBase {
        public function __construct() {
            parent::__construct();
            // Inicializar variables propias aqui
        }
    }

#### Clases - Polimorfismo
En PHP cualquier método puede ser modificado en sus clases derivadas.

    class ClaseBase {
        public function Saludar() {
            return "Hola";
        }
    }
    class ClaseDerivada extends ClaseBase {
        public function Saludar() {
            return parent::Saludar() . " " . " mundo";
        }
    }

#### Clases - Interfaces
Las interfaces en PHP sólo pueden contener declaraciones de métodos. Y se implementan con *implements*.

    interface IInterfaz {
        function Metodo();
    }
    class Clase implements IInterfaz {
        public function Metodo() {
            // Implementacion aqui
        }
    }

#### Clases - Clases abstractas
Las clases abstractas pueden contener atributos y métodos, pero sólo ellas pueden contener métodos con el modificador *abstract*.

    abstract class ClaseAbstracta {
        public abstract function Metodo();
    }
    class ClaseDerivada extends ClaseAbstracta {
        public function Metodo() {
            // Implementacion aqui
        }
    }

#### Clases - Constructores

    class Coche {
        // Atributos
        public $marca;
        public $color;

        // Constructor con parámetros opcionales
        public function __construct($marca, $color = "") {
            $this->marca = $marca;
            $this->color = $color;
        }
    }
    $coche = new Coche("FIAT", "NEGRO");
    $coche = new Coche("FORD"); // Opcional 2do parámetro

### Objetos
El operador flecha `->` es utlizado para acceder a los *miembros de instancia* de la clase.  
El operador "dos puntos" `::` es utilizado para acceder a los *miembros estáticos* de la clase.

    // Creo el objeto
    $nombreObj = new NombreClase();
    // Métodos de instancia.    Atributos de instancia.
    $nombreObj->Func3();        $nombreObj->attr3;
    // Métodos de clase.        Atributos estáticos.
    NombreClase::Func4();       NombreClase::$attr4;

