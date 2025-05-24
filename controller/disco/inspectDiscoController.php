<?php
require_once __DIR__ . "/../../config/config.php";
require_once __DIR__ . "/../../config/functions.php";
require_once __DIR__ . "/../../config/DataBaseAccess.php";

require_once __DIR__ . "/../../model/disco/Disco.php";
require_once __DIR__ . "/../../model/disco/DiscoDAO.php";

$dao = null;
$disco = null;

if(isset($_GET['id'])){
    $dao = new DiscoDAO(DatabaseAccess::getPDO());
    $disco = Disco::fill($dao->searchById($_GET['id']));
}

renderHead($disco->getTitulo(),"../styles/inspectStyle.css");

require_once __DIR__ . "/../../global/header.php";
require_once __DIR__ . "/../../view/disco/inspectDisco.php";
require_once __DIR__ . "/../../global/footer.php";
