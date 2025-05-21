<?php

require_once "config.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route = str_replace(BASE_URL, '', $uri);

switch ($route) {
    case "/":
    case "":
        require_once __DIR__ . "/../controller/indexController.php";
        break;

    case "create":
        require_once __DIR__ . "/../controller/create/createController.php";
        break;

    case "create/disco":
        require_once __DIR__ . '/../controller/create/createDiscoController.php';
        break;
    
    case "list":
        require_once __DIR__ . '/../controller/list/listController.php';
        break;
    
    case "list/disco":
        require_once __DIR__ . '/../controller/list/listDiscoController.php';
        break;

    default:
        http_response_code(404);
        echo "Página não encontrada";
        break;
}
