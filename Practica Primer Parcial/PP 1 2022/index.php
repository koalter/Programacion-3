<?php
require './Entidades/Pizza.php';
require './Entidades/Venta.php';
require './Entidades/VentaDAO.php';
require './Utils/DataAccessObject.php';
require './Utils/JsonUtils.php';
require './Utils/StringUtils.php';
require './Utils/FileUtils.php';
require './Utils/Constants.php';

switch ($_SERVER['REQUEST_METHOD']) 
{
    case 'GET':
        switch (StringUtils::Standarize($_GET['action'])) 
        {
            case 'pizzacarga':
                include './Funciones/PizzaCarga.php';
                break;
            case 'consultarventas':
                include './Funciones/ConsultarVentas.php';
                break;
            default:
                http_response_code(404);
                break;
        }
        break;
    case 'POST':
        switch (StringUtils::Standarize($_POST['action'])) 
        {
            case 'pizzaconsultar':
                include './Funciones/PizzaConsultar.php';
                break;
            case 'altaventa':
                include './Funciones/AltaVenta.php';
                break;
            case 'pizzacarga':
                include './Funciones/PizzaCargaPost.php';
                break;
            default:
                http_response_code(404);
                break;
        }
        break;
    case 'PUT':
        parse_str(file_get_contents("php://input"), $_PUT);
        switch (StringUtils::Standarize($_PUT['action']))
        {
            case 'modificarventa':
                include './Funciones/ModificarVenta.php';
                break;
            default:
                http_response_code(404);
                break;
        }
        break;
    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DELETE);
        switch (StringUtils::Standarize($_DELETE['action']))
        {
            case 'borrarventa':
                include './Funciones/borrarVenta.php';
                break;
            default:
                http_response_code(404);
                break;
        }
        break;
}
?>