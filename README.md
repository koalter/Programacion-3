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

## Archivos

### Abrir archivos  
`fopen()`  
Nos permite abrir un archivo ya sea de manera local o externa (http:// o ftp://)  
* El primer parámetro de *fopen* contiene el nombre del archivo a ser abierto, y el segundo especifica el modo en que el archivo será abierto  
* El valor de retorno de *fopen* es un entero. Nos servirá para referenciar al archivo abierto.

    // int fopen(archivo, modo);
    $archivo = fopen("archivo.txt", "r");

| Modo | Descripción |
| :--: | ----------- |
| r | Abre un archivo para sólo lectura. El cursor comienza al principio del archivo. |
| r+ | Apertura para lectura y escritura; coloca el puntero al fichero al principio del fichero. |
| w | Apertura para sólo escritura; coloca el puntero al fichero al principio del fichero y trunca el fichero a longitud cero. Si el fichero no existe se intenta crear. |
| w+ | Apertura para lectura y escritura; coloca el puntero al fichero al principio del fichero y trunca el fichero a longitud cero. Si el fichero no existe se intenta crear. |
| a | Apertura para sólo escritura; coloca el puntero del fichero al final del mismo. Si el fichero no existe, se intenta crear. |
| a+ | Apertura para lectura y escritura; coloca el puntero del fichero al final del mismo. Si el fichero no existe, se intenta crear. |
| x | Crea un nuevo archivo para sólo lectura. Retorna `false` y un error si el archivo existe. |
| x+ | Creación y apertura para lectura y escritura; de otro modo tiene el mismo comportamiento que **x** |

### Cerrar archivos  
`fclose()`  
Nos permite cerrar un archivo abierto  
*fclose* requiere el indicador del archivo a ser cerrado (la variable que referencia al archivo)  
Retorna `true` si tuvo éxito, `false` caso contrario

    $archivo = fopen("archivo.txt", "r");
    // Trabajamos con el archivo
    fclose($archivo);

### Leer archivos  
`fread()`  
Nos permite leer de un archivo abierto  
El primer parámetro de *fread* contiene el indicador del archivo a ser leído, y el segundo especifica el número máximo de bytes que serán leídos  
Retorna un string que representa al contenido del archivo leído.

    $archivo = fopen("archivo.txt", "r");
    echo fread($archivo, filesize("archivo.txt"));
    // Lee el archivo completo

`fgets()`  
Nos permite leer *una linea* de un archivo abierto  
Requiere como parámetro el indicador del archivo a ser leído, y retorna un string que representa la línea que fue leída  
Después de cada llamada a *fgets*, el cursor se mueve a la siguiente linea

    $archivo = fopen("archivo.txt", "r");
    echo fgets($archivo);

### Escribir archivos  
`fwrite()` `fputs()`  
Nos permite escribir en un archivo abierto  
La función parará cuando llegue al fin del archivo o cuando alcance la longitud especificada  
El primer parámetro contiene el archivo a ser leído, y el segundo es el string a ser escrito. El tercer parámetro es opcional e indica la cantidad de bytes a ser escritos  
Retorna la *cantidad de bytes* que se escribieron o `false` si hubo error.

    // Usando fwrite()
    $archivo = fopen("archivo.txt", "w");
    echo fwrite($archivo, "Prueba de guardado");
    fclose($archivo);
    // Usando fgets()
    $archivo = fopen("archivo.txt", "w");
    echo fputs($archivo, "Prueba de guardado");
    fclose($archivo);

### Copiar archivos  
`copy()`  
Permite copiar un archivo  
Los parámetros que recibe son los nombres de los archivos. El primero es el archivo origen, luego el destino de la copia  
Retorna `true` en caso de éxito o `false` en caso contrario.

    echo copy("archivoACopiar.txt", "archivoCopiado.txt");

## Envío de datos

### HTTP (HyperText Transfer Protocol)

**HTTP** está diseñado para permitir comunicaciones entre clientes y servidores.

**HTTP** funciona como un protocolo de pedido-respuesta entre cliente y servidor.

Un navegador web puede ser el cliente y una aplicación sobre un computador que aloja un sitio web puede ser un servidor.

### HTTP - Método GET  
El par de nombres/valores es enviado en la dirección *URL* (texto claro)  
Las peticiones `GET` se pueden almacenar en caché  
Permanecen en el historial del navegador  
Pueden ser marcadas (book marked)  
Nunca debe ser utilizado cuando se trata de datos confidenciales  
Tiene limitaciones de longitud de datos (longitud máxima de 2048 caracteres en la URL).

### HTTP - Método POST  
El par de nombres/valores es enviado en el cuerpo del mensaje **HTTP**  
Las peticiones `POST` no se almacenan en caché  
No permanecen en el historial del navegador  
No pueden ser marcadas  
No poseen restricciones de longitud de datos.

### HTTP - Manejo de formularios  
Tanto `GET` como `POST` crean un array asociativo  
Dicho array contiene pares de clave-valor, donde las claves son los nombres (atributo `name`) de los controles del formulario y los valores son la entrada de datos del usuario.

**PHP** utiliza las super globales `$_GET`, `$_POST` y `$_REQUEST` para recolectar datos provenientes de un Form.

`$_GET` es un array pasado por **GET**. `$_POST` es un array pasado por **POST**.

`$_REQUEST` es un array asociativo que contiene `$_GET`, `$_POST` y `$_COOKIE`