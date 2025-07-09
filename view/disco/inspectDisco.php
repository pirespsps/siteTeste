<div class="backgroundCard">

    <h1><?=$disco->getTitulo()?></h1>

    <img src="<?=BASE_URL . $disco->getPath_img() ?>">

    <div id="bandaAno">
        <h2>Banda: <?=$disco->getBanda()?></h2>
        <h2>Ano: <?=$disco->getAno()?></h2>
    </div>

    <div id="trackList">
        <h1>Tracks</h1>
        <?= renderTracks($tracks)?>
    </div>

    <form method="POST" action="<?=BASE_URL?>inspect/disco?id=<?=$disco->getId()?>">
        <input value="<?=$disco->getId()?>" name="id" hidden>

    <div id="buttons">
        <button name="button" value="remove" class="button"><img src="<?=BASE_URL?>assets/images/removeIcon.png"> Remover </button>
        <button name="button" value="edit" class="button"><img src="<?=BASE_URL?>assets/images/editIcon.png"> Editar </button>
        <button name="button" value="pdf" class="button"><img src="<?=BASE_URL?>assets/images/downloadIcon.png"> PDF </button> 
    </div>

    </form>

</div>