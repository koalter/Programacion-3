<?php
/*
Aplicación No 3 (Obtener el valor del medio)
Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
Ejemplo 1: $a = 6; $b = 9; $c = 8; => se muestra 8.
Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”
*/

$a = 5;
$b = 1;
$c = 5;

$medio = "No hay valor del medio";

if ($a != $b)
{
    if ($a > $b)
    {
        $mayor = $a;
        $menor = $b;
    }
    else 
    {
        $mayor = $b;
        $menor = $a;
    }

    if ($c > $mayor) 
    {
        $medio = $mayor;
        $mayor = $c;
    }
    else 
    {
        if ($c < $menor)
        {
            $medio = $menor;
            $menor = $c;
        }
        else if ($c < $mayor && $c > $menor) 
        {
            $medio = $c;
        }
    }
}

echo $medio;

?>