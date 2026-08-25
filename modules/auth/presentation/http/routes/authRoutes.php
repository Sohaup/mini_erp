<?php

use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Route\Router;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$router = new Router();

$router->get("/" , function (ServerRequestInterface $request) : ResponseInterface {
    $response = new Response();
    $response->getBody()->write("<h1>Welcome</h1>");
    return $response;
});

$request = ServerRequestFactory::fromGlobals(); 
$response = $router->dispatch($request);
(new SapiEmitter)->emit($response);