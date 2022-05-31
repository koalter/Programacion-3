<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

interface IApiValidador {
    static function Validar(Request $request, RequestHandler $handler);
}