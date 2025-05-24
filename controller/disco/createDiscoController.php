<?php
require_once __DIR__ . "/../../config/config.php";
require_once __DIR__ . "/../../config/functions.php";
require_once __DIR__ . "/../../config/DataBaseAccess.php";

require_once __DIR__ . "/../../model/disco/Disco.php";
require_once __DIR__ . "/../../model/disco/DiscoDAO.php";
require_once __DIR__ . "/../../global/Popup.php";

renderHead("Criar Disco","../styles/createStyle.css");
require_once __DIR__ . "/../../global/header.php";
require_once __DIR__ . "/../../view/disco/createDisco.php";
require_once __DIR__ . "/../../global/footer.php";

//

if(isset($_POST['nomeDisco']) && isset($_FILES['fileDisco'])){
    if(save()){
        PopUp::savedPopUp();
    }
}

//functions 

function save(){
    $dao = new DiscoDAO(DatabaseAccess::getPDO());
    $obj = new Disco();

    $nome_disco = trim(htmlspecialchars($_POST['nomeDisco']));
    
    $tmp = $_FILES['fileDisco']['tmp_name'];
    $ext = pathinfo($_FILES['fileDisco']['name'],PATHINFO_EXTENSION);

    $nome_arq = str_replace(" ","",strtolower($nome_disco));
    $nome_arq .= ".$ext";

    move_uploaded_file($tmp, DISCO_DIR . $nome_arq);

    $obj->setTitulo($nome_disco);
    $obj->setPath_img(DISCO_DIR . $nome_arq);

    $dao->create($obj);

    return true;
}