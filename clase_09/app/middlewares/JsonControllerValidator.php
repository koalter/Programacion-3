<?php
use Slim\Psr7\Response;

class JsonControllerValidator implements IApiValidador {
    public static function Validar($request, $handler) {
        $metodo = $request->getMethod();

        if ($metodo === 'GET') {
            $response = $handler->handle($request);
        } else if ($metodo === 'POST') {
            $parametros = $request->getParsedBody();
            if (strtolower($parametros['perfil']) !== 'administrador') {
                $response = new Response();
                $response->getBody()->write(json_encode(array("mensaje" => "ERROR. " . $parametros['nombre'] . " sin permisos."), JSON_UNESCAPED_UNICODE));

                return $response->withStatus(403);
            }

            $response = $handler->handle($request);
        }

        return $response;
    }
}