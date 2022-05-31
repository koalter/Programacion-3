<?php
use Slim\Psr7\Response;

class Credenciales implements IApiValidador {
    public static function Validar($request, $handler) {
        $metodo = $request->getMethod();
        
        if ($metodo === 'GET') {
            $response = $handler->handle($request);
        } elseif ($metodo === 'POST') {
            if (strtolower($_POST['perfil']) === 'administrador') {
                $response = $handler->handle($request);
            } else {
                $response = new Response();
                $response->getBody()->write('<h1>No tienes habilitado el ingreso</h1>');
            }
        }
        return $response;
    }
}