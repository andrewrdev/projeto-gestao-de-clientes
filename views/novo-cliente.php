<?php

require_once __DIR__ . "/authentication.php" ?>

<?php

use classes\CustomerRegister;

$customerRegister = new CustomerRegister();
$customerRegister->setName(filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS));
$customerRegister->setAddress(filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS));
$customerRegister->setCity(filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS));
$customerRegister->setState(filter_input(INPUT_POST, "state", FILTER_SANITIZE_SPECIAL_CHARS));
$customerRegister->setPhone(filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS));
$customerRegister->setMail(filter_input(INPUT_POST, "mail", FILTER_SANITIZE_SPECIAL_CHARS));
$customerRegister->register();

?>

<?php require_once __DIR__ . "/head.php" ?>

<?php require_once __DIR__ . "/header.php" ?>

<section class="novo-cliente">
  <div class="container">
    <div class="row">
      <div class="box-novo-cliente">
        <form action="" method="post">
          <input type="text" name="name" placeholder="Nome" autocomplete="off">
          <input type="text" name="address" placeholder="Endereço" autocomplete="off">
          <input type="text" name="city" placeholder="Cidade" autocomplete="off">
          <select name="state">
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="BA">Bahia</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
          </select>
          <input type="text" name="phone" id="customerRegisterPhone" placeholder="Telefone" autocomplete="off">
          <input type="text" name="mail" placeholder="Email" autocomplete="off">
          <input type="submit" name="submit" value="Cadastrar">
        </form>
        <?php if(!empty($customerRegister->getMessages())): ?>
          <div class="customer-register-success"><?= $customerRegister->getMessages() ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . "/footer.php" ?>