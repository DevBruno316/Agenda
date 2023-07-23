<?php

include "templates/header.php";

?>

<?php if(isset($printMsg) && $printMsg != ''): ?>
    <p><?=$printMsg ?></p>
    <?php endif; ?>

<div id="view-contact-container">
    <?php include_once("templates/backBtn.html")?>
    <h1 id="main-title"><?= $contact['nome']?></h1>
    <p class="bold">Telefone:</p>
    <p id="main-title"><?= $contact['Telefone']?></p>
    <p class="bold">Observações:</p>
    <?php if($contact['descricao'] != ""):?>
    <p id="main-title"><?= $contact['descricao']?></p>
    <?php else:?>
        <p id="main-title">Este contato não possui descrição. Para mudar, clique <a href="<?= $BASE_URL ?>edit.php">aqui</a></p>
    <?php endif;?>

    </div>
    


<?php

include "templates/footer.php";

?>