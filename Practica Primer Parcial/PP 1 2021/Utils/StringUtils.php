<?php
class StringUtils 
{
    /**
     * Chequea que la cadena pasada por parámetro sea nula o vacía de contenido.
     * 
     * @param string $str la cadena a ser analizada.
     * @return bool devuelve TRUE si la cadena es nula, vacía o está compuesta únicamente por espacios en blanco.
     */
    public static function IsNullOrWhitespace(string|null $str) 
    {
        if ($str != null) 
        {
            return trim($str) === "";
        }
        return true;
    }
    
    /**
     * Elimina los espacios en blanco al principio y final de una cadena, al mismo tiempo que pasa todos sus caracteres a minúsculas.
     * 
     * @param string $str la cadena a "estandarizar".
     * @return string devuelve la nueva cadena "estandarizada".
     */
    public static function Standarize(string $str) 
    {
        return trim(strtolower($str));
    }

    /**
     * Chequea mediante RegEx que la cadena ingresada tenga formato de correo electrónico.
     * 
     * @param string $str la cadena a ser validada.
     * @return bool devuelve TRUE si es válido, caso contrario FALSE.
     */
    public static function ValidateEmail(string $str) 
    {
        $result = false;
        if (!StringUtils::IsNullOrWhitespace($str)) 
        {
            $pattern = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
            if (preg_match($pattern, $str)) 
            {
                $result = true;
            }
        }
        return $result;
    }

    /**
     * Corta una cadena en la primera ocurrencia del separador
     * 
     * @param string $str la cadena a cortar.
     * @param string $separator el criterio para cortar.
     * @param bool $right [opcional] determina si lo que se devuelve es el contenido a la izquierda (por defecto) o derecha del separador.
     * @param bool $includeSeparator [opcional] determina si el caracter separador se incluye en la cadena resultado.
     * @return string devuelve la cadena procesada.
     */
    public static function Cut(string $str, string $separator, bool $right = false, bool $includeSeparator = false)
    {
        if ($str == null || $str === "")
        {
            throw new Exception('Parámetro $str en StringUtils::Cut es inválido.');
        }
        if (strlen($separator) !== 1)
        {
            throw new Exception('Parámetro $separator en StringUtils::Cut es inválido.');
        }

        $result = "";

        if ($right) 
        {
            for ($i = strlen($str) - 1; $i >= 0; $i--)
            {
                if ($str[$i] === $separator)
                {
                    return strrev($includeSeparator ? $result.$separator : $result);
                }
                $result .= $str[$i];
            }
        }
        else 
        {
            for ($i = 0; $i < strlen($str); $i++)
            {
                if ($str[$i] === $separator)
                {
                    return $includeSeparator ? $result.$separator : $result;
                }
                $result .= $str[$i];
            }
        }

        return $result;
    }

    /**
     * Da formato textual a un objeto DateTime y lo retorna
     * 
     * @param DateTime $datetime el objeto a formatear.
     * @return string el DateTime formateado.
     */
    public static function DateTimeToString(DateTime $datetime, string $format = 'd/m/Y H:i:s')
    {
        return $datetime->format($format);
    }

    /**
     * Da formato textual a un objeto DateTime y lo retorna (formato válido para nombres de archivos)
     * 
     * @param DateTime $datetime el objeto a formatear.
     * @return string el DateTime formateado.
     */
    public static function DateToString(DateTime $datetime)
    {
        return StringUtils::DateTimeToString($datetime, 'd-m-Y');
    }

    /**
     * Convierte una cadena de fecha a otro formato.
     * 
     * @param string $format el nuevo formato.
     * @param string $datetime la fecha.
     * @return string la fecha con nuevo formato.
     */
    public static function ConvertDateTimeFormat(string $format, string $datetime)
    {
        $timestamp = strtotime($datetime);
        $new = date($format, $timestamp);

        return $new;
    }
}