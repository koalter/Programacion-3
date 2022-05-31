<?php
class JsonUtils
{
    /**
     * Abre un archivo .json y lee su contenido.
     * 
     * @param string $filename el archivo json a donde se irá a obtener la información.
     * @return mixed devuelve el contenido del archivo json y en su defecto un array vacío.
     */
    public static function LeerListado(string $filename)
    {
        if (file_exists($filename))
        {
            $archivo = fopen($filename, "r");
            
            if ($archivo)
            {
                $texto = fread($archivo, filesize($filename));
                fclose($archivo);

                if ($texto)
                {
                    return json_decode($texto);
                }
            }
        }
            
        return array();
    }

    /**
     * Copia el contenido pasado por parámetro al archivo especificado.
     * 
     * @param array $listado el contenido.
     * @param string $filename el archivo.
     * @return bool TRUE si se pudo realizar la operación, FALSE en caso de error.
     */
    public static function ActualizarListado(array $listado, string $filename) 
    {
        $resultado = false;
        $archivo = fopen($filename, "w");

        if ($archivo)
        {
            $jsonString = json_encode($listado);
            if ($jsonString) 
            {
                if (fwrite($archivo, $jsonString))
                {
                    $resultado = true;
                }
            }
            fclose($archivo);
        }

        return $resultado;
    }
}