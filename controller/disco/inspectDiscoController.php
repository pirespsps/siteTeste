<?php
require_once __DIR__ . "/../../config/config.php";
require_once __DIR__ . "/../../config/functions.php";
require_once __DIR__ . "/../../config/DataBaseAccess.php";

require_once __DIR__ . "/../../model/disco/Disco.php";
require_once __DIR__ . "/../../model/disco/DiscoDAO.php";
require_once __DIR__ . "/../../model/track/Track.php";
require_once __DIR__ . "/../../model/track/TrackDAO.php";

$dao = null;
$disco = null;

if(isset($_GET['id'])){
    $discoDao = new DiscoDAO(DatabaseAccess::getPDO());
    $disco = $discoDao->searchById($_GET['id']);

    $trackDao = new TrackDAO(DatabaseAccess::getPDO());
    $tracks = $trackDao->searchFromDiscoId($disco);
}

//

renderHead($disco->getTitulo(),"../styles/inspectStyle.css");
require_once __DIR__ . "/../../global/header.php";
require_once __DIR__ . "/../../view/disco/inspectDisco.php";
require_once __DIR__ . "/../../global/footer.php";


// functions 

function loadTracks($tracks){
    for($i = 0;$i<sizeof($tracks);$i++){
        $count = $i+1;
        $track = $tracks[$i]->getNome();

        echo "<div>";
        echo "<p> #$count - </p>";
        echo "<h2 class='countTrack'> $track </h2>";
        echo "</div>";

    }
}