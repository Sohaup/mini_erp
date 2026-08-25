<?php

use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Route\Router;
use miniErp\modules\auth\infrastructure\adapters\EnvAdapter;
use miniErp\modules\auth\infrastructure\adapters\HtmlResponse;
use miniErp\modules\auth\infrastructure\config\DB\DBManeger;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

require_once __DIR__ . '/../vendor/autoload.php';
// require_once __DIR__ . "/../modules/auth/presentation/http/routes/authRoutes.php";

EnvAdapter::initialize();
DBManeger::initializeDataBase();

$router = new Router();

$router->get("/", function (ServerRequestInterface $request): ResponseInterface {
    $response = new HtmlResponse();
    return $response->getResponse("<h1>Welcome</h1>");
});

$request = ServerRequestFactory::fromGlobals();
$response = $router->dispatch($request);
(new SapiEmitter)->emit($response);



