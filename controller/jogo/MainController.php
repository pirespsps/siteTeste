<?php
require_once __DIR__ . "/../../config/config.php";
require_once __DIR__ . "/../../config/functions.php";

renderHead("Jogo","styles/jogoStyle.css");

require_once __DIR__ . "/../../global/header.php";

require_once __DIR__ . "/../../view/jogo/mainJogoView.php";

require_once __DIR__ . "/../../global/footer.php";