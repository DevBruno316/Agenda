<?php

include "templates/header.php";



?>

<div class="index-title">
    <h1> CRIAR CONTATO</h1>
</div>


<form action="<?= $BASE_URL ?>connect/process.php" method="post" id="form-space">
    <!--A função deste input hidden, é enviar o parâmetro da execução ao process-->
    <input type="hidden" name="type" value="create">

    <div class="col-md-5">
        <label for="Name" class="form-label">Nome do contato:</label>
        <input type="text" name="nome" class="form-control" id="Name" aria-describedby="Nome" placeholder="Digite o nome" required>
    </div>

    <div class="col-md-5">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="tel" class="form-control" id="telefone" placeholder="Digite o telefone" name="tel" required>
    </div>

    <div class="col-md-5">
        <label for="desc" class="form-label">Descrição</label>
        <textarea type="text" class="form-control" placeholder="Insira as observações" id="desc" rows="3" name="descricao"></textarea>
    </div>


    <button type="submit" class="btn btn-primary" id="bott">Submit</button>
</form>







<?php




include "templates/footer.php";

?>