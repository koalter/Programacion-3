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

### Getters y Setters

`__set()` se ejecuta al escribir datos sobre propiedades inaccesibles (protegidas o privadas) o inexistentes.

`__get()` se utiliza para consultar datos a partir de propiedades inaccesibles (protegidas o privadas) o inexistentes.

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

## Subir archivos al servidor

Para poder subir archivos al servidor, es necesario crear un **formulario HTML** que le permita a los usuarios seleccionar un archivo.

    <!doctype html>
    <html>
    <head>
        <title>Subir archivos</title>
    </head>
    <body>
        <form action="upload.php" method="post" enctype="multipart/form-dat">
            <input type="file" name="archivo" />
            <input type="submit" value="Subir" />
        </form>
    </body>
    </html>

### Reglas para subir archivos al servidor

* Algunas reglas a seguir para el formulario HTML.  
    - El método del formulario debe ser **POST**.  
    - El formulario necesita del atributo **enctype**. Dicho atributo

Del lado del servidor, tenemos que manipular el archivo recibido en **$_FILES**.  
Utilizando funciones de **PHP** deberemos mover el archivo subido desde su ubicación temporal a la ubicación definitiva dentro del servidor.

    $destino = "uploads/".$_FILES["archivo"]["name"];
    move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino);

### Atributos

El nuevo atributo booleano **multiple** (de HTML5) permite que los usuarios seleccionen varios archivo para ser subidos al servidor.

El atributo **accept**, permite filtrar (en el cliente) los tipos de archivos que se permitirán subir al servidor.

    <form action="upload.php" method="post"
    enctype="multipart/form-data" >
        <input type="file" name="archivos[]" multiple
        accept="image/png,.jpg,image/gif" />
        <input type="submit" value="Subir" />
    </form>

## Variables de Sesión - Generalidades

Las variables de sesión son una forma de guardar información de un usuario particular, que puede ser usada en distintas páginas del sitio Web.

La información **NO** es almacenada en el cliente.

Dado que **HTTP** NO mantiene estado entre páginas, la utilización de variables de sesión permite mantener información acerca de un solo usuario, y están disponibles para todas las páginas del sitio Web.

Por defecto, las variables de sesión duran hasta que el usuario cierra el navegador.

### Variables de Sesión - Abrir una sesión

Una sesión se inicia con la función `session_start()`.

Dicha función debe estar declarada en cada script al que deseamos utilizar con variables de sesión.

Las variables de sesión se establecen con la variable super global de PHP: **$_SESSION**.

    session_start();
    $_SESSION["CLAVE"] = "VALOR";

La mayoría de las sessiones establecen una clave de usuario en el cliente, que se parece a: `765487cf34ert8dede5a562e4f3a7e12`.

Cuando una sesión se abre en otra página, se examina el equipo para obtener una clave de usuario.

Si hay una coincidencia, 



Para eliminar todas las variables de sesión globales y destruir la sesión, hay que usar `session_unset()` y `session_destroy()`.

    // remueve todas las variables de sesión
    session_unset();

    // destruye la sesión
    session_destroy();

## Cookies - Generalidades

Una *cookie* se utiliza a menudo para **identificar a un usuario**.

Una *cookie* es un pequeño archivo que el **servidor guarda en el cliente**.

Cada vez que el mismo equipo solicita una página con un navegador, se **enviará la cookie también**.

Con **PHP**, se puede tanto crear como recuperar valores de cookies.

### Cookies - Establecer una cookie

`setcookie()` define una cookie para ser enviada junto con el resto de las cabeceras de HTTP.

al igual que las cabeceras, las cookies deben ser enviadas antes de que el script genere ninguna salida (es una restricción del protocolo).

Esto implica que las llamadas a esta función se coloquen antes de que se genere cualquier salida, incluyendo las etiquetas `<html>` y `<head>` al igual que cualquier espacio en blanco.

Una vez que han sido enviadas las cookies, se puede acceder a ellas en la próxima carga de la página gracias a los arrays **$_COOKIE**.

A excepción del parámetro `name`, los parámetros son opcionales.

Si existe algún tipo de salida anterior a la llamada de esta función, `setcookie()` fallará y retornará `FALSE`.

Si `setcookie()` ejecuta satisfactoriamente, retornará `TRUE`.

Esto no indica si es que el usuario ha aceptado la cookie o no.

    // setcookie(name, [value], [expire], [path], [domain], [secure], [httponly])
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    // 86400 = 1 día

### Parámetros de setcookie()

Es una **variable super global** que existe a partir de **PHP 4.1.0**.

Es un array asociativo de elementos cargados al script actual a través del método **POST**.

- `name` - Indica el nombre de la cookie.
- `value` - Establece el valor de la cookie. Este valor se guarda en el cliente.
- `expire` - Indica el tiempo en el que expira la cookie. Es una fecha Unix por tanto está expresada en números de segundos a partir de la presente época
- `path` - Indica la ruta dentro del servidor en la que la cookie estará disponible.
- `domain` - El dominio para el cual la cookie está disponible.
- `secure` - Establece si la cookie sólo debiera transmitirse por una conexión segura HTTPS desde el cliente. Cuando se configura como `TRUE`, la cookie sólo se creará si es que existe una conexión segura.
- `httponly` - Cuando es `TRUE` la cookie será accesible sólo a través del protocolo HTTP. Esto significa que la cookie no será accesible por lenguajes de scripting, como Javascript.

### Cookies - Borrar una cookie

Para borrar una cookie se debe asegurar que la fecha de expiración ya ha pasado, de este modo se detonará el mecanismo de eliminación del navegador.

    setcookie("TestCookie2", " ", time() - 3600);
    setcookie("TestCookie2", " ", time() - 3600, "/~cookie/", "test.com", 1);

#### Demo 
https://phpsandbox.io/e/x/k6qms

### Base de datos - SQL

#### Generalidades - Instrucciones SQL

Se utilizan para agregar, quitar, cambiar o recuperar información de una base de datos.

* `SELECT` - Consulta campos y/o registros de la BD que safisfagan un criterio determinado.
* `INSERT` - Agrega un registro a una tabla de una BD.
* `UPDATE` - Modifica los valores de campos de la BD que satisfagan un criterio determinado.
* `DELETE` - Elimina registros de una tabla de una BD.

Se deben tener los permisos adecuados.

#### Sentencias - SELECT

La sentencia `SELECT` es usada para seleccionar registros desde una tabla de la base de datos. Sintaxis: `SELECT columna1, columna2, ... FROM tabla_nombre;`

    -- Ejemplo seleccionar registros de la tabla usuarios
    -- Todos los campos de la tabla
    SELECT * FROM usuarios;
    -- Solo los campos nombre y apellido
    SELECT nombre, apellido FROM usuarios;

#### Sentencias - Cláusula WHERE

Es utilizada para seleccionar datos condicionalmente en base a criterios especificados. Sintaxis: `SELECT * FROM tabla_nombre WHERE condicion;`

    -- Ejemplo seleccionar registros condicionales de tabla usuarios
    SELECT * FROM usuarios
    WHERE apellido = 'Diaz';

    SELECT * FROM usuarios
    WHERE fecha_nacimientos > '1/1/1970';

    SELECT * FROM usuarios
    WHERE fecha_nacimientos >= '1/1/1970';

#### DEMO

https://www.db-fiddle.com/f/wxfc4oKsn6S3dW2V6VZDrF/1

#### Sentencias - INSERT

Es utilizada para poder insertar registros en una tabla de la BD. Sintaxis: `INSERT INTO table_name (columna1, columna2, ...) VALUES (valor1, valor2, ...);`

    -- Ejemplo insertar registros de la tabla usuarios
    INSERT INTO usuarios (nombre, apellido, fecha_nacimiento)
    VALUES ('Jorge', 'Diaz', '1969-07-11');

#### Sentencias - UPDATE

Es utilizada para poder actualizar registros en una tabla de la BD. Sintaxis: `UPDATE table_name SET (columna1 = valor1, columna2 = valor2, ...) WHERE condicion;`.

    -- Ejemplo actualizar registros de la tabla usuarios
    UPDATE usuarios SET nombre = 'Jorgecito', apellido = 'Diaaz'
    WHERE apellido = 'Diaz';

#### Sentencias - DELETE

Es utilizada para poder remover registros en una tabla de la BD. Sintaxis: `DELETE FROM table_name WHERE condicion;`

    -- Ejemplo remover registros de la tabla usuarios
    DELETE FROM usuarios WHERE apellido = 'Diaz';

#### DEMO

https://www.db-fiddle.com/f/is8eAXQJSn4zCQnQxhFGkS/1