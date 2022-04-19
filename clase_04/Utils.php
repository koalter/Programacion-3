<?php

function listar_json($parametro)
{
    if ($archivo = fopen($parametro.".json", "r"))
    {
        $stringBuilder = array("<ul>");
        if ($jsonString = fread($archivo, filesize($parametro.".json")))
        {
            $lista = json_decode($jsonString);
            foreach ($lista as $elemento) 
            {
                $stringBuilder[] = "<li>" . implode(", ", get_object_vars($elemento)) . "</li>";
            }
        }
        fclose($archivo);
        $stringBuilder[] = "</ul>";
        return implode($stringBuilder);
    }

    return null;
}