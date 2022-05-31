<?php
class CredencialController {
    public function Get($request, $response, $args) {
        $response->getBody()->write('NO necesita credenciales para GET');
        return $response;
    }

    public function Post($request, $response, $args) {
        $response->getBody()->write('<h1>Bienvenido ' . $request->getParsedBody()['nombre'] . '</h1>');
        return $response;
    }
}