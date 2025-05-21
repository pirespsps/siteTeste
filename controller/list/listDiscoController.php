<?php
require_once __DIR__ . "/../../config/config.php";
require_once __DIR__ . "/../../config/functions.php";


renderHead("Lista de Discos","../styles/listStyle.css");

require_once __DIR__ . "/../../global/header.php";
require_once __DIR__ . "/../../view/list/listDisco.php";
require_once __DIR__ . "/../../global/footer.php";
