<?php
class JsonController {
    public function Get($request, $response, $args) {
        $payload = json_encode(array("mensaje" => "API => GET"));
        $response->getBody()->write($payload);
        
        return $response;
    }

    public function Post($request, $response, $args) {
        $parametros = $request->getParsedBody();
        $payload = json_encode(array("nombre" => $parametros['nombre'], "perfil" => $parametros['perfil']));
        $response->getBody()->write($payload);
        
        return $response;
    }
}