<?php

require_once "config.php";
require_once "functions.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route = str_replace(BASE_URL, '', $uri);

$routes = [
    
    "/"=> __DIR__ . "/../controller/indexController.php",
    "" => __DIR__ . "/../controller/indexController.php",

    "list" => __DIR__ . "/../controller/redirectController.php",
    "create" => __DIR__ . "/../controller/redirectController.php",

    "create/disco" => __DIR__ . "/../controller/disco/createDiscoController.php",

    "list/disco" => __DIR__ . "/../controller/disco/listDiscoController.php",

    "inspect/disco" => __DIR__ . "/../controller/disco/inspectDiscoController.php",

    "tradutor" => __DIR__ . "/../controller/tradutor/tradutor.php",
    
    "jogo" => __DIR__ . "/../controller/jogo/mainController.php",

];

routeUri($routes, $route);

function routeUri($routes, $route)
{

    if (array_key_exists($route, $routes)) {
        require_once $routes[$route];
    } else {
        abortRoute();
    }
}

function abortRoute()
{
    http_response_code(404);
    require_once __DIR__ . "/../view/404.php";
    die();
}