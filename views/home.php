<?php

use classes\CustomerSelect;
use classes\StringFormat;

require_once __DIR__ . "/authentication.php" ?>

<?php

$customerSelect = new CustomerSelect();
$resultData = $customerSelect->getAll();

?>

<?php require_once __DIR__ . "/head.php" ?>

<?php require_once __DIR__ . "/header.php" ?>

<section class="clientes">
  <div class="container">
    <div class="row">

      <div class="clientes-info">
        <h2><span><i class="fas fa-users"></i></span> Clientes (<?= count($resultData) ?>)</h2>
      </div>
      <table class="tb-clientes">
        <thead>
          <tr>
            <td>Nome</td>
            <td>Endereço</td>
            <td>Cidade</td>
            <td>Estado</td>
            <td>Telefone</td>
            <td>Email</td>
            <td colspan="2">Ação</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($resultData as $key) : ?>
            <tr>
              <td><?= StringFormat::defineLength($key["nome"]) ?></td>
              <td><?= StringFormat::defineLength($key["endereco"]) ?></td>
              <td><?= StringFormat::defineLength($key["cidade"]) ?></td>
              <td><?= $key["estado"] ?></td>
              <td><?= $key["telefone"] ?></td>
              <td><?= StringFormat::defineLength($key["email"]) ?></td>
              <td><a href="<?= BASE_URL ?>/editar?cliente=<?= $key["id"] ?>" class="btn-edit">Editar</a> <a href="<?= BASE_URL ?>/excluir?cliente=<?= $key["id"] ?>" class="btn-delete">Excluir</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?php require_once __DIR__ . "/footer.php" ?>