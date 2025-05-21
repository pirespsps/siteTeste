<?php
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../config/functions.php";
require_once __DIR__ . "/../config/DataBaseAcess.php";

require_once __DIR__ . "/../model/disco/Disco.php";
require_once __DIR__ . "/../model/disco/DiscoDAO.php";

renderHead("Esoteric Order of Dagon","styles/indexStyle.css");

require_once __DIR__ . "/../global/header.php";
require_once __DIR__ . "/../view/index.php";
require_once __DIR__ . "/../global/footer.php";

// functions

function renderCardDisco(){
    $dao = new DiscoDAO(DatabaseAcess::getPDO());

    foreach($dao->readLastX(10) as $fetch){
        $obj = Disco::fill($fetch);
        
        $path = str_replace(BASE_URL,"",$obj->getPath_img());
        $nome = ucfirst($obj->getTitulo());

        echo "<div class='card'>";
        echo "<img class='disco' src='$path'>";
        echo "<p class='nomeDisco'>$nome</p>";
        echo "</div>";

    }

}