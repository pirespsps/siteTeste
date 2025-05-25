<div id="formDiv">

    <h1>Criar Disco</h1>
    <form method="POST" action="<?=BASE_URL?>create/disco" enctype="multipart/form-data">

    <fieldset>

    <label for="nomeDisco">Nome do Disco</label>
    <input type="text" name="nomeDisco" required>

    <label for="bandaDisco">Banda</label>
    <input class="bandaAno" type="text" name="bandaDisco" required>

    <label for="anoDisco">Ano</label>
    <input class="bandaAno" type="text" name="anoDisco" required>

    <div id="tracks">

    <label for="track1">Track 1</label>
    <input type="text" id="track1" name="track[]" required>

    </div>

    <label for="fileDisco">Capa do Disco</label>
    <input type="file" accept="image/png, image/jpeg" name="fileDisco" required>

    <input id="enviarBT" type="submit" value="Enviar">
    
    </fieldset>

    </form>

</div>

<script src="../script/create.js"></script>