<?php
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../config/functions.php";
require_once __DIR__ . "/../config/DataBaseAccess.php";

require_once __DIR__ . "/../model/disco/Disco.php";
require_once __DIR__ . "/../model/disco/DiscoDAO.php";

renderHead("Esoteric Order of Dagon","styles/indexStyle.css");

require_once __DIR__ . "/../global/header.php";
require_once __DIR__ . "/../view/index.php";
require_once __DIR__ . "/../global/footer.php";

// functions

function renderCardDisco(){
    $dao = new DiscoDAO(DatabaseAccess::getPDO());

    foreach($dao->readLastX(10) as $obj){
        
        $path = str_replace(BASE_URL,"",$obj->getPath_img());
        $nome = ucfirst($obj->getTitulo());
        $id = $obj->getId();

        echo "<a href='inspect/disco?id=$id'>";

        echo "<div class='card'>";
        echo "<img class='disco' src='$path'>";
        echo "<p class='nomeDisco'>$nome</p>";
        echo "</div>";

        echo "</a>";

    }

}