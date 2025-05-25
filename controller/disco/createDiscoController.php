<?php
require_once __DIR__ . "/../../config/config.php";
require_once __DIR__ . "/../../config/functions.php";
require_once __DIR__ . "/../../config/DataBaseAccess.php";

require_once __DIR__ . "/../../model/disco/Disco.php";
require_once __DIR__ . "/../../model/disco/DiscoDAO.php";
require_once __DIR__ . "/../../model/track/Track.php";
require_once __DIR__ . "/../../model/track/TrackDAO.php";
require_once __DIR__ . "/../../global/Popup.php";

//

renderHead("Criar Disco","../styles/createStyle.css");
require_once __DIR__ . "/../../global/header.php";
require_once __DIR__ . "/../../view/disco/createDisco.php";
require_once __DIR__ . "/../../global/footer.php";

//

if(isset($_POST['nomeDisco']) && isset($_FILES['fileDisco'])){
    if(saveDisco()){
        PopUp::savedPopUp();
    }
}

//functions 

function saveDisco(){
    $discodao = new DiscoDAO(DatabaseAccess::getPDO());
    $disco = new Disco();

    $nome_disco = trim(htmlspecialchars($_POST['nomeDisco']));
    $banda_disco = trim(htmlspecialchars($_POST['bandaDisco']));
    $ano_disco = $_POST['anoDisco'];
    
    $tmp = $_FILES['fileDisco']['tmp_name'];
    $ext = pathinfo($_FILES['fileDisco']['name'],PATHINFO_EXTENSION);

    $nome_arq = str_replace(" ","",strtolower($nome_disco));
    $nome_arq .= ".$ext";

    move_uploaded_file($tmp, DISCO_DIR . $nome_arq);

    $disco->setTitulo($nome_disco);
    $disco->setBanda($banda_disco);
    $disco->setAno($ano_disco);
    $disco->setPath_img(DISCO_DIR . $nome_arq);

    $discodao->create($disco);

    $disco = $discodao->readLastX(1)[0];
    saveTrack($disco);
    
    return true;
}

function saveTrack(Disco $disco){
    
    $trackDao = new TrackDAO(DatabaseAccess::getPDO());
    $tracks = $_POST['track'];
    $tracks = array_filter($tracks);

    foreach($tracks as $i => $track){
        $tracks[$i] = Track::fillForm(trim(htmlspecialchars($track)));
    }

    $trackDao->createMultiple($tracks,$disco->getId());

    return true;
}