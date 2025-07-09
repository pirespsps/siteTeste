<?php
require_once __DIR__ . "/../../config/config.php";
require_once __DIR__ . "/../../config/functions.php";
require_once __DIR__ . "/../../config/DataBaseAccess.php";

require_once __DIR__ . "/../../model/disco/Disco.php";
require_once __DIR__ . "/../../model/disco/DiscoDAO.php";
require_once __DIR__ . "/../../model/disco/DiscoPDF.php";
require_once __DIR__ . "/../../model/track/Track.php";
require_once __DIR__ . "/../../model/track/TrackDAO.php";

session_start();

$dao = null;
$disco = null;


if (isset($_POST['button'])) {
    switch ($_POST['button']) {
        case 'pdf':
            generatePdf($_SESSION['disco'], $_SESSION['tracks']);
            break;
        case 'edit':
            break;
        case 'remove':
            break;
    }
}

if (isset($_GET['id'])) {

    if (!isset($_SESSION['disco']) || $_SESSION['disco']->getId() != $_GET['id']) {

        $discoDao = new DiscoDAO(DatabaseAccess::getPDO());
        $disco = $discoDao->searchById($_GET['id']);

        $trackDao = new TrackDAO(DatabaseAccess::getPDO());
        $tracks = $trackDao->searchFromDiscoId($disco);

        $_SESSION['disco'] = $disco;
        $_SESSION['tracks'] = $tracks;

    } else {

        $disco = $_SESSION['disco'];
        $tracks = $_SESSION['tracks'];

    }
} else {
    require_once __DIR__ . "/../../view/404.php";
    http_response_code(404);
    die();
}

//

renderHead($disco->getTitulo(), "../styles/inspectStyle.css");
require_once __DIR__ . "/../../global/header.php";
require_once __DIR__ . "/../../view/disco/inspectDisco.php";
require_once __DIR__ . "/../../global/footer.php";


// functions 

function renderTracks($tracks)
{
    for ($i = 0; $i < sizeof($tracks); $i++) {
        $count = $i + 1;
        $track = $tracks[$i]->getNome();

        echo "<div>";
        echo "<p> #$count - </p>";
        echo "<h2> $track </h2>";
        echo "</div>";

    }
}

function generatePdf(Disco $disco, array $tracks)
{
    $discoPdf = new DiscoPDF("P","cm","A4");
    $discoPdf->GeneratePDF(['disco'=>$disco,"tracks"=>$tracks]);

    endSession();
}

function endSession()
{
    session_unset();
    session_abort();
}