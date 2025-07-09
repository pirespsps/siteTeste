<?php

require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../config/functions.php";

$linkType = str_contains($_SERVER['REQUEST_URI'],"create")? BASE_URL . "create" : BASE_URL ."list";

$titulo = $linkType == BASE_URL . "create"? "Criar" : "Listar";

renderHead($titulo,"styles/redirectStyle.css");

require_once __DIR__ . "/../global/header.php";
require_once __DIR__ . "/../view/redirectPage.php";
require_once __DIR__ . "/../global/footer.php";