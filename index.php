<?php

include "templates/header.php";

?>
<div class="container">
  <?php if (isset($printMsg) && $printMsg != '') : ?>
    <p id="msg"><?= $printMsg ?></p>
  <?php endif; ?>

  <h1 id="main-title">MINHA AGENDA</h1>


  <?php if (count($contacts) > 0) : ?>

    <table class="table" id="contacts-table">
      <thead class="table-primary">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Telefone</th>
          <th scope="col"> </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($contacts as $contato) : ?>
          <tr>
            <th scope="row"><?= $contato['id'] ?></th>
            <td><?= $contato['nome'] ?></td>
            <td><?= $contato['Telefone'] ?></td>
            <td class="actions">
              <a href="<?= $BASE_URL ?>show.php?id=<?= $contato['id'] ?>"><i class="fas fa-eye check-icon"></i></a>
              <a href="<?= $BASE_URL ?>edit.php?id=<?= $contato['id'] ?>"><i class="far fa-edit edit-icon"></i></a>

              <form action="<?= $BASE_URL ?>connect/process.php" method="post" id="delete-form">
                <input type="hidden" name="type" value="delete">
                <input type="hidden" name="id" value="<?= $contato["id"]?>">
                <button class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
              </form>

            </td>
          </tr>
        <?php endforeach; ?>
      <?php else : ?>
        <p id="empty-list-text">Ainda não há contatos na sua agenda. MAs você pode adicionà-los clicando <a href="<?= $BASE_URL ?>adicionar.php"> aqui</a></p>
      <?php endif; ?>

      </tbody>
    </table>
</div>

<?php

include "templates/footer.php";

?>