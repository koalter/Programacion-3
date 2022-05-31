<?php

class Logger
{
    public static function LogOperacion($request, $handler)
    {
        $response = $handler->handle($request);
        $response->getBody()->write("\nLogOperacion");
    
        return $response;
    }
}