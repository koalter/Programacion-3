<?php
class VentaDAO 
{
    public static function GuardarUno(Venta $venta)
    {
        $result = false;
        if (Venta::Validar($venta))
        {
            $query = 'INSERT INTO ventas (id_pizza, usuario, sabor, tipo, cantidad) VALUES (:id_pizza, :usuario, :sabor, :tipo, :cantidad);';
            $pizzaId = $venta->_pizzaId;
            $email = $venta->_email;
            $cantidad = $venta->_cantidad;
            $sabor = $venta->_sabor;
            $tipo = $venta->_tipo;

            try 
            {
                $statement = DataAccessObject::Get()->Query($query);
                $statement->bindParam(':id_pizza', $pizzaId, PDO::PARAM_INT);
                $statement->bindParam(':usuario', $email, PDO::PARAM_STR);
                $statement->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
                $statement->bindParam(':sabor', $sabor, PDO::PARAM_STR);
                $statement->bindParam(':tipo', $tipo, PDO::PARAM_STR);

                $result = $statement->execute();
            }
            catch (PDOException $e)
            {
                print "Error!: " . $e->getMessage();
                return false;
            }
        }
        return $result;
    }

    public static function GetCantidadPizzasVendidas()
    {
        $result = 0;
        $query = 'SELECT SUM(v.cantidad) FROM ventas v';
        try 
        {
            $statement = DataAccessObject::Get()->Query($query);
            if ($statement->execute())
            {
                $statement->bindColumn(1, $result);
                $statement->fetchAll(PDO::FETCH_BOUND);
            }
        }
        catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage();
            return -1;
        }
        return $result;
    }

    public static function GetVentasPorFechas(string $from, string $to)
    {
        $result = array();
        $query = 'SELECT id_pizza, usuario, sabor, tipo, cantidad, fecha FROM ventas WHERE fecha BETWEEN ? and ? ORDER by sabor';
        try 
        {
            $statement = DataAccessObject::Get()->Query($query);
            $statement->bindParam(1, $from, PDO::PARAM_STR);
            $statement->bindParam(2, $to, PDO::PARAM_STR);
            if ($statement->execute())
            {
                foreach ($statement->fetchAll(PDO::FETCH_ASSOC) as $row)
                {
                    $result[] = new Venta($row['id_pizza'], $row['sabor'], $row['tipo'], $row['cantidad'], $row['usuario'], date_create($row['fecha']));
                }
            }
        }
        catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage();
            return null;
        }
        return $result;
    }

    public static function GetVentasPorUsuario(string $usuario)
    {
        $result = array();
        $query = 'SELECT id_pizza, usuario, sabor, tipo, cantidad, fecha FROM ventas WHERE usuario = :usuario';
        try 
        {
            $statement = DataAccessObject::Get()->Query($query);
            $statement->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            if ($statement->execute())
            {
                foreach ($statement->fetchAll(PDO::FETCH_ASSOC) as $row)
                {
                    $result[] = new Venta($row['id_pizza'], $row['sabor'], $row['tipo'], $row['cantidad'], $row['usuario'], date_create($row['fecha']));
                }
            }
        }
        catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage();
            return null;
        }
        return $result;
    }

    public static function GetVentasPorSabor(string $sabor)
    {
        $result = array();
        $query = 'SELECT id_pizza, usuario, sabor, tipo, cantidad, fecha FROM ventas WHERE sabor = :sabor';
        try 
        {
            $statement = DataAccessObject::Get()->Query($query);
            $statement->bindParam(':sabor', $sabor, PDO::PARAM_STR);
            if ($statement->execute())
            {
                foreach ($statement->fetchAll(PDO::FETCH_ASSOC) as $row)
                {
                    $result[] = new Venta($row['id_pizza'], $row['sabor'], $row['tipo'], $row['cantidad'], $row['usuario'], date_create($row['fecha']));
                }
            }
        }
        catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage();
            return null;
        }
        return $result;
    }

    public static function ModificarVenta(int $pedido, string $email, string $sabor, string $tipo, int $cantidad)
    {
        $result = 0;
        $exist = VentaDAO::GetOne($pedido);

        if (is_null($exist))
        {
            return -1;
        }

        $parametros = array();
        $query = 'UPDATE ventas SET';

        if (!StringUtils::IsNullOrWhitespace($email))
        {
            $parametros[] = ' usuario = :usuario';
        }
        if (!StringUtils::IsNullOrWhitespace($sabor))
        {
            $parametros[] = ' sabor = :sabor';
        }
        if (!StringUtils::IsNullOrWhitespace($tipo))
        {
            $parametros[] = ' tipo = :tipo';
        }
        if ($cantidad >= 1)
        {
            $parametros[] = ' cantidad = :cantidad';
        }

        $query .= implode(',', $parametros);
        $query .= ' WHERE id = :pedido;';

        try 
        {
            $statement = DataAccessObject::Get()->Query($query);
            $statement->bindParam(':pedido', $pedido, PDO::PARAM_INT);
            $statement->bindParam(':usuario', $email, PDO::PARAM_STR);
            $statement->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
            $statement->bindParam(':sabor', $sabor, PDO::PARAM_STR);
            $statement->bindParam(':tipo', $tipo, PDO::PARAM_STR);

            if ($statement->execute()) 
            {
                $result = 1;
            }
        }
        catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage();
            return false;
        }

        return $result;
    }

    public static function BorrarVenta(int $id)
    {
        $result = false;
        $query = 'DELETE FROM ventas WHERE id = :id';

        try
        {
            $statement = DataAccessObject::Get()->Query($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            $result = $statement->execute();
        }
        catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage();
            return false;
        }

        return $result;
    }

    public static function GetOne(int $id)
    {
        $result = null;
        $query = 'SELECT * FROM ventas WHERE id = :id';
        try 
        {
            $statement = DataAccessObject::Get()->Query($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            if ($statement->execute())
            {
                while ($fila = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    if (isset($result))
                    {
                        throw new Exception("Más de un registro posee el mismo id.");
                    }
                    $result = new Venta($fila['id_pizza'], $fila['sabor'], $fila['tipo'], $fila['cantidad'], $fila['usuario'], date_create($fila['fecha']));
                }
            }
        }
        catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage();
            return -1;
        }
        return $result;
    }
}