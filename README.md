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

## PDO (PHP Data Object)

**PDO** define una interfaz ligera para poder acceder a bases de datos en **PHP**.

**PDO** proporciona una capa de abstracción de acceso a datos, independientemente de la base de datos que se esté utilizando, se emplean las mismas funciones para realizar consultas y obtener datos.

**PDO** viene con **PHP** 5.1, y está disponible como una extensión *PECL* para PHP 5.0

**PDO** requiere las características nuevas de POO del núcleo de PHP 5, por lo que no ejecutará con versiones anteriores de **PHP**.

### PDO - Conexiones

Las conexiones se establecen creando instancias de la clase base **PDO**.

No importa el controlador que se utilice siempre se usará el nombre de la clase **PDO**.

El constructor acepta parámetros para especificar el origen de la base de datos (conocido como DSN) y, opcionalmente, el nombre de usuario y contraseña (si la hubiera).

    $conStr = "mysql:host=localhost;dbname=pruebaDB";
    $pdo = new PDO($conStr, $user, $pass);

Si hubieran errores de conexión, se lanzará un objeto **PDOException**

    try 
    {
        $conStr = "mysql:host=localhost;dbname=pruebaDB";
        $pdo = new PDO($conStr, $user, $pass);
    }
    catch (PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }

Una vez realizada con éxito una conexión a la base de datos, será devuelta una instancia de la clase **PDO** al script.

La conexión permanecerá activa durante el tiempo de vida del objeto **PDO**.

Para cerrar la conexión, es necesario destruir el objeto asegurándose de que todas las referencias a él existentes sean eliminadas (esto se puede hacer asignando `NULL` a la variable que contiene el objeto).

Si no se realiza explícitamente, **PDO** cerrará automáticamente la conexión cuando el script finalice.

#### DEMO

https://onlinegdb.com/SgLgRXbCW

### Sentencias Preparadas

Muchas de las bases de datos más maduras admiten el concepto de sentencias preparadas.

Estas pueden definirse como un tipo de plantillas compiladas para SQL que las aplicaciones quieren ejecutar, pudiendo ser personalizadas utilizando parámetros.

Las sentencias preparadas ofrecen grandes beneficios:

* La consulta *sólo necesita ser analizada* (o preparada) *una vez*, pero puede ser ejecutada muchas veces con los mismos o diferentes parámetros.
* Cuando la consulta se prepara, la base de datos analizará, compilará y optimizará su plan para ejecutarla.
* Mediante el empleo de una sentencia preparada, la aplicación *evita repetir el ciclo* de análisis/compilación/optimización. Esto significa que las sentencias preparadas utilizan *menos recursos* y se ejecutará *más rápidamente*.
* Los parámetros para las sentencias preparadas **NO necesitan estar entrecomillados**; el controlador automáticamente se encarga de esto.
* Si una aplicación usa exclusivamente sentencias preparadas, el desarrollador puede estar seguro de que *no hay cabida para inyecciones de SQL*.
* Las sentencias preparadas son tan útiles que son la única característica que **PDO** emulará para los controladores que no las soporten. Esto asegura que una aplicación sea capaz de emplear el mismo paradigma de acceso a datos independientemente de las capacidades de la base de datos.

Las declaraciones preparadas básicamente funcionan así:

* `Prepare()` - Una plantilla de declaración de *SQL* se crea y se envía a la base de datos. Ciertos valores se dejan sin especificar (parámetros). Retorna un objeto de tipo **PDOStatement**.
* La base de datos analiza, compila y realiza la optimización de consultas en la plantilla y almacenar el resultado sin ejecutarlo.
* `Execute()` - En un momento posterior, la aplicación enlaza (*bindea*) los valores a los parámetros y la base de datos ejecuta la instrucción.

    // Sentencia preparada sin parámetros
    $sentencia = $pdo->prepare('SELECT * FROM tabla');
    $sentencia->execute();

    // Sentencia preparada con parámetros
    $sentencia = $pdo->prepare('SELECT * FROM tabla WHERE ID = :id');
    $sentencia->execute(array(':id' => 3));

### PDOStatement

Representa una sentencia preparada y, después de la ejecución de la instrucción, un conjunto de resultados asociados.

Posee métodos para vincular (*bindear*) valores a parámetros.

Posee métodos para obtener los valores de un conjunto de resultados.

#### PDOStatement - Métodos para vincular

`bindParam()` - Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

Sintaxis: `bindParam($param, &$variable, $tipo?, $length?)`
* `$param` - Identificador del parámetro.
* `$variable` - Nombre de la variable de PHP a vincular al parámetro de la sentencia SQL.
* `$tipo` - Tipo de dato explícito para el parámetro, usando las constantes `PDO::PARAM_*`.
* `$length` - Longitud del tipo de dato.

Ejemplo:

    $variableId = 2432; // ID a buscar

    // Sentencia con parámetros nombrados
    $sentencia = $pdo->prepare('SELECT * FROM tabla WHERE ID = :id');
    $sentencia->bindParam(':id', $variableId, PDO::PARAM_INT);
    $sentencia->execute();

    // Sentencia con parámetros posicionales
    $sentencia = $pdo->prepare('SELECT * FROM tabla WHERE ID = ?');
    $sentencia->bindParam(1, $variableId, PDO::PARAM_INT);
    $sentencia->execute();

`bindValue()` - Vincula un valor al parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

Sintaxis: `bindValue($param, $valor, $tipo?)`
* `$param` - Identificador del parámetro.
* `$valor` - Valor a vincular al parámetro de la sentencia SQL.
* `$tipo` - Tipo de dato explícito para el parámetro, usando las constantes `PDO::PARAM_*`.

Ejemplo:

    $variableId = 2432; // ID a buscar

    // Sentencia con parámetros nombrados
    $sentencia = $pdo->prepare('SELECT * FROM tabla WHERE ID = :id');
    $sentencia->bindValue(':id', 2432, PDO::PARAM_INT);
    $sentencia->execute();

    // Sentencia con parámetros posicionales
    $sentencia = $pdo->prepare('SELECT * FROM tabla WHERE ID = ?');
    $sentencia->bindValue(1, $variableId, PDO::PARAM_INT);
    $sentencia->execute();

`bindColumn()` - Vincula una columna a una variable de PHP. Cada llamada a `PDOStatement::fetch()` o a `PDOStatement::fetchAll()` actualizará todas las variables que estén vinculadas a columnas.

Sintaxis: `bindColumn($column, $variable, $tipo?, $maxLen?)`
* `$column` - Número (base 1) o nombre de la columna del conjunto de resultados.
* `$variable` - Nombre de la variable de PHP a la que vincular la columna.
* `$tipo` - Tipo de dato explícito para el parámetro, usando las constantes `PDO::PARAM_*`.
* `$maxLen` - Longitud máxima sugerida para la pre asignación.

Ejemplo:

    $sentencia = $pdo->prepare('SELECT col1, col2, col3 FROM tabla');
    $sentencia->execute();

    // Vincular por número de columna
    $sentencia->bindColumn(1, $var1, PDO::PARAM_INT);
    $sentenci->bindColumn(2, $var2, PDO::PARAM_STR);

    // Vincular por nombre de columna
    $sentencia->bindColumn('col3', $var3, PDO::PARAM_BOOL);

    while ($fila = $sentencia->fetch(PDO::FETCH_BOUND)) {
        $datos = $var1 . "\t" . $var2 . "\t" . $var3 . "\n";
        print $datos;
    }

#### PDOStatement - Métodos para obtener valores

`fetch()` - Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. El parámetro fetch_style determina cómo PDO devuelve la fila.

Sintaxis: `fetch($fetch_style?)`
* `$fetch_style` - Este valor debe ser una de las constantes `PDO::FETCH_*`.
* El valor de retorno de esta función en caso de éxito depende del tipo de obtención. En todos los casos, se devuelve `FALSE` en caso de error.

- `PDO::FETCH_ASSOC` - Devuelve un array indexado por los nombres de las columnas del conjunto de resultados.
- `PDO::FETCH_NUM` - Devuelve un array indexado por el número de columna tal como fue devuelto en el conjunto de resultados, comenzando por la columna 0.
- `PDO::FETCH_BOTH` - Devuelve un array indexado tanto por nombre de columna, como numéricamente con índice de base 0 tal como fue devuelto en el conjunto de resultados.
- `PDO::FETCH_OBJ` - Devuelve un objeto anónimo con nombres de propiedades que se corresponden a los nombres de las columnas devueltas en el conjunto de resultados.
- `PDO::FETCH_CLASS` - Devuelve `TRUE` y asigna los valores de las columnas del conjunto de resultados a las variables de PHP a las que fueron vinculadas con el método `PDOStatement::bindColumn()`.

`fetchAll()` - Devuelve un array que contiene todas las filas de un conjunto de resultados. El parámetro *fetch_style* determina cómo **PDO** devuelve la fila.

Sintaxis: 

## Segunda parte

### REST - Representational State Transfer

Es un tipo de arquitectura de desarrollo web que se apoya totalmente en el estándar *HTTP*.

**REST** nos permite crear servicios y aplicaciones que pueden ser usadas por cualquier dispositivo o cliente que entienda **HTTP**, por lo que es increíblemente más simple y convencional que otras alternativas que se han usado en los últimos diez años como **SOAP** y **XML-RPC**

Por lo tanto **REST** es el tipo de arquitectura más natural y estándar para crear **API**s para servicios orientados a Internet.

**REST** es un conjunto de convenciones para aplicaciones web y servicios web, que se centra principalmente en la manipulación de recursos a través de especificaciones **HTTP**.

Podemos decir que **REST** es una interfaz web estándar y simple que nos permite interactuar con servicios web de una manera muy cómoda.

Gracias a **REST** la web ha disfrutado de escalabilidad como resultado de una serie de diseños fundamentales clave:

### Un protocolo cliente/servidor **sin estado**:
Cada mensaje **HTTP** contiene toda la información necesaria para comprender la petición.

Como resultado, ni el cliente ni el servidor necesitan recordar ningun estado de las comunicaciones entre mensajes.

### Un conjunto de operaciones **bien definidas**:
Que se aplican a todos los recursos de información: **HTTP** en sí define un conjunto pequeño de operaciones, las más importantes son *POST*, *GET*, *PUT* y *DELETE*.

### Composer

*Composer* es una herramienta para la gestión de dependencias de **PHP**.

Permite declarar las bibliotecas de las que depende tu proyecto y las administrará (instalará/actualizará) para vos.

https://getcomposer.org/download/

*Nota personal: es el npm de PHP*

### Slim Framework

Slim es un framework micro de PHP que ayuda a escribir rápidamente aplicaciones Web y APIs sencillas pero poderosas.

En esencia, Slim es un despachador que recibe una solicitud HTTP, invoca una rutina de devolución de llamada apropiada y devuelve una respuesta HTTP.

https://www.slimframework.com/docs/start/installation.html

*Nota personal: es el Express de PHP*

#### Configurar **index.php**

En este archivo se pondrán los verbos HTTP que se recibirán y las rutas por las cuales vamos a poder acceder a ellos.

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Server\RequestHandlerInterface;
    use Slim\Factory\AppFactory;
    use Slim\Routing\RouteCollectorProxy;
    use Slim\Routing\RouteContext;

    // Instanciar App
    $app = AppFactory::create();

Definir el conjunto de operaciones son: **POST**, **GET**, **PUT** y **DELETE**

    // Instanciar App
    $app = AppFactory::create();

    // Rutas
    $app->group('/usuarios', function (RouteCollectorProxy $group) {
        $group->get('[/]', \UsuarioController::class . ':TraerTodos');
        $group->get('/{usuario}', \UsuarioController::class . ':TraerUno');
        $group->post('[/]', \UsuarioController::class . ':CargarUno');
    });
    $app->get('[/]', function (Request $request, Response $response) {
        $response->getBody()->write("Slim Framework 4 PHP");
        return $response;
    });
    $app->run();

Todas las peticiones de HTTP son atendidas por este archivo y no tendría que ponerse explícitamente en la ruta de acceso.

Esto esta mal:  
`http://localhost:8080/miApiRest/index.php/saludo`  
Esto esta bien:  
`http://localhost:8080/miApiRest/saludo`

Para lograr esto se debe crear o modificar el archivo **".htaccess"**

#### Configurar **.htaccess**

Los ficheros .htaccess o "ficheros de configuración distribuída" facilitan la forma de realizar cambios en la configuración de contexto de un directorio.

Un fichero, que contiene una o más directivas, se coloca en un documento específico de un directorio, y estas directivas aplican a ese directorio y todos sus subdirectorios.

    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^ index.php [QSA,L]

#### Ruteo

    $app->get('/libros', function ($request, $response, array $args) {
        // Obtener libros
    });
    $app->get('/libros/{id}', function ($request, $response, array $args
        // Obtener libros por ID
    });
    $app->post('/libros', function ($request, $response, array $args) {
        // Crear un libro
    });
    $app->put('/libros/{id}', function ($request, $response, array $args) {
        // Actualizar libro por ID
    });
    $app->delete('/libros/{id}', function ($request, $response, array $args) {
        // Borrar libros por ID
    }):

Más ejemplos de ruteo:

https://www.slimframework.com/docs/v4/objects/routing.html

### Middleware - PSR7 PSR15

**Middleware** es un software que asiste a una aplicación para interactuar o comunicarse con otras aplicaciones, software, redes, hardware y/o sistemas operativos.

Un middleware implementa la interface **PSR15**:

* `\Psr\Http\Message\ServerRequestInterface` - El objeto de solicitud PSR7 (parámetro).
* `\Psr\Http\Server\RequestHandlerInterface` - El objeto controlador de solicitudes PSR15 (parámetro).
* `\Psr\Http\Message\ResponseInterface` - El objeto de respuesta PSR7 (retorno).

#### PHP Standards Recommendations.

Documentación oficial:

* http://www.php-fig.org/psr/psr-7/
* http://www.php-fig.org/psr/psr-15/

Un mensaje HTTP es una petición de un cliente a un servidor o una respuesta de un servidor a un cliente.

Estas especificaciones definen interfaces para los mensajes HTTP:

* `Psr\Http\Message\RequestInterface` (PSR7)
* `Psr'Http\Message\RequestHandlerInterface` (PSR15)

El único requisito es que un middleware DEBE devolver una instancia de \Psr\Http\Message\\**ResponseInterface**.

Cada middleware DEBERÍA invocar al siguiente middleware y pasarle los objetos Request y Response como argumentos*

\**A partir de Slim 4 los parámetros son el Request y un Handler*

## Middleware en Slim 4

En Slim, podemos ejecutar código antes y después de una llamada a nuestra API-Rest, para poder manipular los objetos Request y Response como mejor nos parezca.

Esto se realiza por medio de un middleware.

Posibles usos:

* Proteger la aplicación de la falsificación de solicitudes cruzadas.
* Autenticar las solicitudes antes de ejecutar su aplicación.

Slim añade middleware como capas concéntricas que rodean su aplicación principal.

Cada nueva capa de middleware rodea cualquier capa de middleware existente.

La estructura concéntrica se expande hacia afuera a medida que se añaden capas de middleware adicionales.

La última capa de middleware agregada es la primera en ser ejecutada.

![Esquema de ejecución middleware](https://www.slimframework.com/docs/v4/images/middleware.png)

Para definir la función se debe respetar la *firma* de la estandarización PSR15

    $mwUno = function (Request $request, RequestHandler $handler) : ResponseMW {

        //EJECUTO ACCIONES ANTES DE INVOCAR AL VERBO
        $antes = " en MW_UNO antes del callable <br>";

        //INVOCO AL VERBO
        $response = $handler->handle($request);

        //OBTENGO LA RESPUESTA DEL VERBO
        $contenidoAPI = (string) $response->getBody();

        //GENERO UNA NUEVA RESPUESTA
        $response = new ResponseMW();

        //EJECUTO ACCIONES DESPUES DE INVOCAR AL VERBO
        $despues = " en MW_UNO después del callable <br>";

        $response->getBody()->write("{$antes} {$contenidoAPI} <br> {$despues}");

        return $response;
    }

Para agregarla, se hace con el método de instancia add(), de application, route, map o group.

    $app->add($mwUno);

### Middleware - Route

El *middleware de ruta* solo se invoca si su ruta coincide con el método de solicitud HTTP actual y la URI.

Este middleware es ejecutado inmediatamente después de invocar cualquiera de los métodos de enrutamiento de la aplicación Slim (por ejemplo, get o post).

El middleware se agrega con el método add() de la instancia Route.

    $app->put('/param/', function (Request $request, Response $response, array $args) : Response {
        $response->getBody()->("API => PUT");
        return $response;
    })->add(function (Request $request, RequestHandler $handler): ResponseMW {

        //EJECUTO ACCIONES ANTES DE INVOCAR AL SIGUIENTE MIDDLEWARE
        $antes = " en MW_PUT antes del callable <br>";

        //INVOCO AL SIGUIENTE MW
        $response = $handler->handle($request);

        //OBTENGO LA RESPUESTA DEL MW
        $contenidoAPI = (string) $response->getBody();

        //GENERO UNA NUEVA RESPUESTA
        $response = new ResponseMW();

        //EJECUTO ACCIONES DESPUES DE INVOCAR AL SIGUIENTE MW
        $despues = " en MW_PUT después del callable ";

        $response->getBody()->write("{$antes} {$contenidoAPI} <br> {$despues}");

        return $response;
    });

### Middleware - Group

Los middlewares, además de poder agregarse a la aplicación y a las rutas, pueden también agregarse a los métodos de grupos, como a las rutas individuales internas.

El *middleware de grupo* solo se invoca si su ruta coincide con uno de los métodos de solicitud HTTP definidos y los URI del grupo.

 Para agregar el middleware dentro de un *callback* individual o para todo el grupo, se establecerá mediante el método de instancia add().

    $grupo->get('/hora', function (Request $request, Response $response, array $args) : Response {
        $response->getBody()->(date("H:i:s"));
        return $response;
    })->add(function (Request $request, RequestHandler $handler): ResponseMW {

        //EJECUTO ACCIONES ANTES DE INVOCAR AL SIGUIENTE MIDDLEWARE
        $antes = " en MW_GRUPO_DOS antes del callable <br>";

        //INVOCO AL SIGUIENTE MW
        $response = $handler->handle($request);

        //OBTENGO LA RESPUESTA DEL MW
        $contenidoAPI = (string) $response->getBody();

        //GENERO UNA NUEVA RESPUESTA
        $response = new ResponseMW();

        //EJECUTO ACCIONES DESPUES DE INVOCAR AL SIGUIENTE MW
        $despues = " en MW_GRUPO_DOS después del callable ";

        $response->getBody()->write("{$antes} {$contenidoAPI} <br> {$despues}");

        return $response;
    });

### Middleware - Map

    $app->map(['GET', 'POST'], '/mapeado', function (Request $request, Response $response, array $args) : Response {
        $response->getBody()->write("API => GET o POST");
        return $response;
    })->add(function (Request $request, RequestHandler $handler) : ResponseMW {
        if ($request->getMethod() === 'GET') {
            $respuesta = 'Entro por GET';
        } else if ($request->getMethod() === 'POST') {
            $respuesta = 'Entro por POST';
        }

        //INVOCO AL SIGUIENTE MW
        $response = $handler->handle($request);

        //OBTENGO LA RESPUESTA DEL MW
        $contenidoAPI = (string) $response->getBody();

        //GENERO UNA NUEVA RESPUESTA
        $response = new ResponseMW();

        $response->getBody()->write("{$respuesta} <br> {$contenidoAPI}");
    });

## JSON Web Token

### Autenticación con Tokens

Una de las nuevas tendencias es la autenticación por medio de *Tokens* y que el backend sea un API RESTful.

Funcionamiento:
* El usuario se autentica con usuario/contraseña o a través de un proveedor (como Twitter, Facebook o Google).
* A partir de entonces, cada petición HTTP que haga el usuario va acompañada de un *Token* en la cabecera.
* Este Token no es más que una firma cifrada que le permite al API identificar al usuario.
* Pero este Token no se almacena en el servidor, si no del lado del cliente (en el *localStorage* o *sessionStorage*) y el API es el que se encarga de descifrar ese Token y redirigir el flujo de la aplicación en un sentido u otro.

* Como los tokens son almacenados en el lado del cliente, no hay información de estado y la aplicación se vuelve totalmente escalable.
* Se puede usar el mismo API para diferentes aplicaciones (Web, Mobile, Android, iOS, etc.)
    - Solo hay que enviar los datos en formato JSON y cifrar/descifrar tokens en la autenticación y posteriores peticiones HTTP, a través de un **MIDDLEWARE**
* También añade más seguridad:
    - Al no utilizar cookies para almacenar la información del usuario, se evita ataques **CSRF** (*Cross-Site Request Forgery*) que manipulen la sesión que se envía al backend.

### JWT

Un *JSON Web Token* (o **JWT**) es un estándar abierto (RFC-7519) basado en JSON para crear un token que sirva para enviar datos entre aplicaciones o servicios y garantizar que sean válidos y seguros.

Un JWT está compuesto por 3 partes:
* El encabezado (header)
* El payload
* La firma (signature)

### JWT - Header

La primera parte es la cabecera del token, que a su vez tiene otras dos partes:
* El tipo, en este caso un JWT
* y la codificación utilizada. Comunmente es el algoritmo HMAC SHA256.

El contenido sin codificar es el siguiente:

    {
        "typ": "JWT",
        "alg": "HS256"
    }

Codificado...

    eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9

### JWT - Payload

El *Payload* está compuesto por los llamados **JWT Claims** donde irán colocados los atributos que definen al token.

Los más comunes a utilizar son:
* sub: Identifica el sujeto del token. Ej. Id de usuario.
* iat: Identifica la fecha de creación del token, válido si se quiere poner una fecha de caducidad. En formato de tiempo UNIX.
* exp: Identifica a la fecha de expiración del token. Se calcula a partir del iat. También en formato de tiempo UNIX.

Al payload se le pueden agregar más campos, incluso personalizados.

    {
        "sub": "54a8ce618e91b0b13665e2f9",
        "iat": "1424180484",
        "sub": "1425398142",
        "admin": true,
        "rol": 1
    }

Codificado...

    eyJzdWIiOiIxNDI1Mzk4MTQyIiwiaWF0IjoiMTQyNDE4MDQ4NCIsImFkbWluIjp0cnVlLCJyb2wiOjF9

### JWT - Signature

La firma es la tercera y última parte del JWT.

Está formada por los anteriores componentes (Header y Payload) cifrados en *Base64* con una clave secreta (almacenada en nuestro backend).

Así sirve de *Hash* para comprobar que todo está bien.

    HMACSHA256(
        base64UrlEncode(header) + "." +
        base64UrlEncode(payload),
        miClaveSecreta
    )

Codificado...

    IxIIOGzBOwZGpz97QFRKG3_d8i1aSp31rfeP_XG6LXo

### JWT Completo

El JWT una vez codificado tendrá el siguiente aspecto:

    eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxNDI1Mzk4MTQyIiwiaWF0IjoiMTQyNDE4MDQ4NCIsImFkbWluIjp0cnVlLCJyb2wiOjF9.IxIIOGzBOwZGpz97QFRKG3_d8i1aSp31rfeP_XG6LXo

Para verificar el JWT dirigirse hacia https://jwt.io

### JWT - Ciclo de Vida


#### Nota

Es importante entender que el propósito de usar JWT **NO** es ocultar o ofuscar datos de ninguna manera.

El motivo por el que se utiliza JWT es para demostrar que los datos enviados fueron realmente creados por una fuente auténtica.

Los datos dentro de un JWT están **codificados** y **firmados**, no **cifrados**.

El propósito de **codificar** datos es transformar la estructura de los mismos.

Los datos firmados permiten que el receptor verifique la autenticidad de la fuente de los datos.

Entonces, codificar y firmar datos **NO** protege los datos.

Por otro lado, el objetivo principal del cifrado es proteger los datos y evitar el acceso no autorizado.

#### Definiciones

La codificación es para mantener la usabilidad de los datos y puede revertirse empleando el mismo algoritmo que codifica el contenido, es decir, no se utiliza ninguna clave.

El cifrado es para mantener la confidencialidad de los datos y requiere el uso de una clave (mantenida en secreto) para volver a texto plano.

*Hashing* es para validar la integridad del contenido mediante la detección de todas las modificaciones de los mismos mediante cambios obvios en la salida hash.

La ofuscación se usa para evitar que las personas entiendan el significado de algo, y se usa a menudo con la ayuda de una computadora para evitar la ingeniería inversa exitosa y/o el robo de la funcionalidad de un producto.

### JWT en Slim - Crear

La creación de un JWT se realiza por medio del método estático *encode* de la clase **Firebase/JWT**

    $app->post("/jwt/crearToken[/]", function (Request $request, Response $response, array $args) : Response {

        $datos = $request->getParsedBody();
        $ahora = time();

        // PARAMETROS DEL PAYLOAD -- https://tools.ietf.org/html/rfc7519#section-4.1 --
        // SE PUEDEN AGREGAR LOS PROPIOS, EJ. 'app'=> "API REST 2022"
        $payload = array(
            "iat" => $ahora,
            "exp" => $ahora + (30),
            "data" => $datos,
            "app" => "API REST 2022"
        );

        // CODIFICO A JWT (PAYLOAD, CLAVE, ALGORITMO DE CODIFICACIÓN)
        $token = JWT:encode($payload, "miClaveSecreta", "HS256");

        $newResponse = $response->withStatus(200, "Éxito!!! JSON enviado.");

        // GENERO EL JSON A PARTIR DEL ARRAY.
        $newResponse->getBody()->write(json_encode($token));

        // INDICO EL TIPO DE CONTENIDO QUE SE RETORNARÁ (EN EL HEADER).
        return $newResponse->withHeader("Content-Type", "application/json");
    });

En nuestro ejemplo simple de 3 entidades, estamos utilizando un JWT que está firmado por el algoritmo HS256, donde solo el servidor de autenticación y el servidor de aplicaciones conocen la clave secreta. 

El servidor de aplicaciones recibe la clave secreta del servidor de autenticación cuando la aplicación configura su proceso de autenticación. 

Dado que la aplicación conoce la clave secreta, cuando el usuario hace una llamada a API asociada a JWT a la aplicación, la aplicación puede ejecutar el mismo algoritmo de firma que en el Paso 3 en el JWT. 

La aplicación puede verificar que la firma obtenida de su propia operación hash coincida con la firma en el JWT mismo (es decir, que coincida con la firma JWT creada por el servidor de autenticación). 

Si las firmas coinciden, entonces eso significa que el JWT es válido, lo que indica que la llamada API procede de una fuente auténtica. De lo contrario, si las firmas no coinciden, significa que el JWT recibido no es válido, lo que puede ser un indicador de un posible ataque a la aplicación. 

Entonces al verificar el JWT, la aplicación agrega una capa de confianza entre él y el usuario.

### JWT en Slim - Verificar

La verificación del JWT se realiza por medio del método estático *decode* de la clase

    $app->post("jwt/verificarToken[/]", function (Request $request, Response $response, array $args) : Response {
        
        $datos = $request->getParsedBody();
        $token = $datos['token'];

        $retorno = new stdClass();
        $status = 200;

        try {
            // DECODIFICO EL TOKEN RECIBIDO
            JWT:decode(
                $token,             // JWT
                "miClaveSecreta",   // CLAVE USADA EN LA CREACIÓN
                ['HS256']           // ALGORITMO DE DECODIFICACIÓN
            );

            $retorno->mensaje = "Token OK!!!";
        } catch (Exception $e) {
            
            $retorno->mensaje = "Token no válido!!! ---> " . $e->getMessage();
            $status = 500;
        }

        $newResponse = $response->withStatus($status);

        $newResponse->getBody()->write(json_encode($retorno));

        return $newResponse->withHeader("Content-Type", "application/json");
    });
