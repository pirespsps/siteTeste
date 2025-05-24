<?php

require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../config/functions.php";

renderHead("Listas","../styles/listStyle.css");

require_once __DIR__ . "/../global/header.php";
require_once __DIR__ . "/../view/indexList.php";
require_once __DIR__ . "/../global/footer.php";