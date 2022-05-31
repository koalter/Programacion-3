<?php
class Venta implements JsonSerializable
{
    private int $_id;
    private int $_pizzaId;
    private string $_email;
    private string $_sabor;
    private string $_tipo;
    private int $_cantidad;
    private DateTime $_fecha;

    public function __construct(int $pizzaId, string $sabor, string $tipo, int $cantidad, string $email, DateTime $fecha = null) 
    {
        $this->_pizzaId = $pizzaId;
        $this->_sabor = $sabor;
        $this->_tipo = $tipo;
        $this->_cantidad = $cantidad;
        $this->_email = $email;
        if (!isset($fecha))
        {
            $fecha = date_create();
        }
        $this->_fecha = $fecha;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public static function AltaVenta(string $email, string $sabor, string $tipo, int $cantidad)
    {
        $resultado = false;
        $listado = JsonUtils::LeerListado(Constants::$PIZZA_JSON_FILE);
        $pizza = new Pizza($sabor, $tipo, 1, $cantidad);
        $i = $pizza->GetIndexIn($listado);

        if ($i >= 0) 
        {
            $listado[$i]->_cantidad -= $pizza->_cantidad;
            if ($listado[$i]->_cantidad >= 0) 
            {
                $venta = new Venta($listado[$i]->_id, $pizza->_sabor, $pizza->_tipo, $pizza->_cantidad, $email);
                if (VentaDAO::GuardarUno($venta))
                {
                    if (JsonUtils::ActualizarListado($listado, Constants::$PIZZA_JSON_FILE))
                    {
                        $user = StringUtils::Cut($email, "@", false, true);
                        $key = "archivo";
                        $directorio = "./ImagenesDeLaVenta";
                        $filename = $tipo.'+'.$sabor.'+'.$user.' '.StringUtils::DateToString($venta->_fecha);//StringUtils::ConvertDateTimeFormat('d-m-Y', $venta->_fecha);
                        $resultado = FileUtils::GuardarArchivo($key, $directorio, $filename, ".jpg");
                    }
                }
            }
        }

        return $resultado;
    }

    public static function GetCantidadPizzasVendidas()
    {
        return json_encode(VentaDAO::GetCantidadPizzasVendidas());
    }

    public static function GetVentasPorFechas(DateTime $from, DateTime $to)
    {
        $ventas = array();
        if (isset($from) && isset($to))
        {
            $stringFrom = StringUtils::DateTimeToString($from, 'Y-m-d');
            $stringTo = StringUtils::DateTimeToString($to, 'Y-m-d');
            $ventas = VentaDAO::GetVentasPorFechas($stringFrom, $stringTo);
        }
        return json_encode($ventas);
    }

    public static function GetVentasPorUsuario(string $usuario)
    {
        $ventas = array();
        if (!StringUtils::IsNullOrWhitespace($usuario))
        {
            $ventas = VentaDAO::GetVentasPorUsuario($usuario);
        }
        return json_encode($ventas);
    }

    public static function GetVentasPorSabor(string $sabor)
    {
        $ventas = array();
        if (!StringUtils::IsNullOrWhitespace($sabor))
        {
            $ventas = VentaDAO::GetVentasPorSabor($sabor);
        }
        return json_encode($ventas);
    }

    public static function ModificarVenta(int $pedido, string $email, string $sabor, string $tipo, int $cantidad)
    {
        return VentaDAO::ModificarVenta($pedido, $email, $sabor, $tipo, $cantidad);
    }

    public static function ModificarVenta_v2(int $pedido, string $email, string $sabor, string $tipo, int $cantidad)
    {
        $registro = VentaDAO::GetOne($pedido);
        if ($registro && VentaDAO::ModificarVenta($pedido, $email, $sabor, $tipo, $cantidad) === 1)
        {
            $input = './ImagenesDeLaVenta/'.$registro->tipo.'+'.$registro->sabor.'+'.StringUtils::Cut($registro->email, '@', false, true).' '.StringUtils::DateToString($registro->fecha);
            $output = $tipo.'+'.$sabor.'+'.StringUtils::Cut($email, '@', false, true).' '.StringUtils::DateToString($registro->fecha);
            FileUtils::MoverArchivo($input, './ImagenesDeLaVenta/', $output);
        }
    }

    public static function BorrarVenta(int $pedido)
    {
        $resultado = false;
        $registro = VentaDAO::GetOne($pedido);
        if (isset($registro))
        {
            $input = './ImagenesDeLaVenta/'.$registro->_tipo.'+'.$registro->_sabor.'+'.StringUtils::Cut($registro->_email, '@', false, true).' '.StringUtils::DateToString($registro->_fecha).'.jpg';
            $output = './BACKUPVENTAS';
            if (FileUtils::MoverArchivo($input, $output))
            {
                $resultado = VentaDAO::BorrarVenta($pedido);
            }
        }

        return $resultado;
    }

    public static function Validar(Venta $venta)
    {
        return isset($venta) &&
        StringUtils::ValidateEmail($venta->_email) &&
        !StringUtils::IsNullOrWhitespace($venta->_sabor) &&
        !StringUtils::IsNullOrWhitespace($venta->_tipo) &&
        $venta->_pizzaId >= 1 &&
        $venta->_cantidad >= 1;
    }
}