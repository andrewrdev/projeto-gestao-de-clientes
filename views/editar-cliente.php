<?php

require_once __DIR__ . "/authentication.php" ?>

<?php

use classes\CustomerEdit;
use classes\CustomerSelect;

$customerEdit = new CustomerEdit();
$customerEdit->setID(filter_input(INPUT_GET, "cliente", FILTER_VALIDATE_INT));
$customerEdit->setName(filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS));
$customerEdit->setAddress(filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS));
$customerEdit->setCity(filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS));
$customerEdit->setState(filter_input(INPUT_POST, "state", FILTER_SANITIZE_SPECIAL_CHARS));
$customerEdit->setPhone(filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS));
$customerEdit->setMail(filter_input(INPUT_POST, "mail", FILTER_SANITIZE_SPECIAL_CHARS));
$customerEdit->update();

$customerSelect = new CustomerSelect();
$customerData = $customerSelect->getByID(filter_input(INPUT_GET, "cliente", FILTER_VALIDATE_INT));

?>

<?php require_once __DIR__ . "/head.php" ?>

<?php require_once __DIR__ . "/header.php" ?>

<section class="novo-cliente">
  <div class="container">
    <div class="row">
      <div class="box-novo-cliente">
        <form action="" method="post">
          <input type="text" name="name" placeholder="Nome" autocomplete="off" value="<?= $customerData["nome"] ?>">
          <input type="text" name="address" placeholder="Endereço" autocomplete="off" value="<?= $customerData["endereco"] ?>">
          <input type="text" name="city" placeholder="Cidade" autocomplete="off" value="<?= $customerData["cidade"] ?>">
          <select name="state">
            <option value="<?= $customerData["estado"] ?>"><?= $customerData["estado"] ?></option>
          </select>
          <input type="text" name="phone" id="customerRegisterPhone" placeholder="Telefone" autocomplete="off" value="<?= $customerData["telefone"] ?>">
          <input type="text" name="mail" placeholder="Email" autocomplete="off" value="<?= $customerData["email"] ?>">
          <input type="submit" name="submit" value="Atualizar">
        </form>
        <?php if(!empty($customerEdit->getMessages())): ?>
          <div class="customer-register-success"><?= $customerEdit->getMessages() ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . "/footer.php" ?>