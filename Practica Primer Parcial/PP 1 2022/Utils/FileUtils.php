<?php
class FileUtils 
{
    /**
     * Guarda un archivo especificado haciendo uso del array $_FILES
     * 
     * @param string $key es la clave con la que se identifica el archivo asociado a $_FILES (referencia a $_FILES[$key]).
     * @param string $output [opcional] es el directorio donde se guardará el archivo. Su valor por defecto es el directorio base.
     * @param string $filename [opcional] es el nombre explícito del archivo a guardar. Por defecto usará el que contenga $_FILES[$key]["name"]
     * @param string $extension [opcional] extensión del archivo CON PUNTO. Se puede omitir si fue incluído en el nombre del archivo.
     * @return bool devuelve TRUE si se pudo guardar o FALSE si hubo una falla.
     */
    public static function GuardarArchivo(string $key, string $output = null, string $filename = null, string $extension = '') 
    {
        if (StringUtils::IsNullOrWhitespace($filename))
        {
            $filename = $_FILES[$key]["name"];
        }
        
        if (StringUtils::IsNullOrWhitespace($output))
        {
            $output = './';
        }
        else if (!($output[strlen($output) - 1] === '/'))
        {
            $output .= '/';
        }

        if (!file_exists($output))
        {
            mkdir($output, 0777, true);
        }
        return move_uploaded_file($_FILES[$key]["tmp_name"], $output.$filename.$extension);
    }

    /**
     * Mueve un archivo de un directorio a otro.
     * 
     * @param string $input el path completo a donde se ubica el archivo.
     * @param string $output el directorio donde se alojará el archivo.
     * @param string $filename nombre y extensión alternativa que recibirá el archivo a destino.
     * @return bool devuelve TRUE si se pudo guardar o FALSE si hubo una falla.
     */
    public static function MoverArchivo(string $input, string $output, string $filename = "")
    {
        if (StringUtils::IsNullOrWhitespace($filename))
        {
            $filename = StringUtils::Cut($input, "/", true);
        }

        if (StringUtils::IsNullOrWhitespace($output))
        {
            $output = './';
        }
        else if (!($output[strlen($output) - 1] === '/'))
        {
            $output .= '/';
        }

        if (!file_exists($output))
        {
            mkdir($output, 0777, true);
        }
        return rename($input, $output.$filename);
    }
}