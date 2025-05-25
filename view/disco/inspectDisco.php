<div class="backgroundCard">

    <h1><?=$disco->getTitulo()?></h1>

    <img src="<?=BASE_URL . $disco->getPath_img() ?>">

    <div id="bandaAno">
        <h2>Banda: <?=$disco->getBanda()?></h2>
        <h2>Ano: <?=$disco->getAno()?></h2>
    </div>

    <div id="trackList">
        <h1>Tracks</h1>
        <?= loadTracks($tracks)?>
    </div>

</div>