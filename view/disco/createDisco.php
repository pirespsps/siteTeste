<div id="formDiv">

    <h1>Criar Disco</h1>
    <form method="POST" action="<?=BASE_URL?>create/disco" enctype="multipart/form-data">

    <fieldset>

    <label for="nomeDisco">Nome do Disco</label>
    <input type="text" name="nomeDisco" required>

    <label for="fileDisco">Capa do Disco</label>
    <input type="file" accept="image/png, image/jpeg" name="fileDisco" required>

    <input id="enviarBT" type="submit" value="Enviar">
    
    </fieldset>

    </form>

</div>