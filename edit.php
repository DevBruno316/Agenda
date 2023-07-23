<?php

include "templates/header.php";

?>

<div class="index-title">
    <h1> Editar Contato</h1>
</div>


<form action="<?= $BASE_URL ?>connect/process.php" method="post" id="form-space">
    <input type="hidden" name="type" value="edit">
    <input type="hidden" name="id" value="<?= $contact["id"]?>">
    <div class="col-md-6">
        <label for="Name" class="form-label">Nome do contato:</label>
        <input type="text" name="nome" class="form-control" id="Name" aria-describedby="Nome" value="<?= $contact["nome"]?>">

    </div>
    <div class="col-md-6">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="tel" class="form-control" id="telefone" name="tel" value="<?= $contact["Telefone"]?>">
    </div>

    <div class="col-md-6">
        <label for="desc" class="form-label">Descrição</label>
        <textarea type="text" class="form-control" placeholder="Insira as observações" id="desc" rows="3" name="descricao" ><?= $contact["descricao"]?></textarea>
    </div>


    <button type="submit" class="btn btn-primary" id="bott">Atualizar</button>
</form>

<?php

include "templates/footer.php";

?>