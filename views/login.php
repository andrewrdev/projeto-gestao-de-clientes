<?php

use classes\UserLogin;

$userLogin = new UserLogin();
$userLogin->setUserName(filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS));
$userLogin->setUserPass(filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS));
$userLogin->login();

?>

<?php require_once __DIR__ . "/head.php" ?>

<section class="login">
  <div class="login-box">
    <div class="container">
      <div class="row">
        <h2>Login</h2>
        <form action="" method="post">
          <input type="text" name="name" placeholder="Usuário" autocomplete="off">
          <input type="password" name="password" placeholder="Senha">
          <input type="submit" name="submit" value="Entrar">
        </form>
        <?php if(!empty($userLogin->getLoginErrors()) && filter_input(INPUT_POST, "submit")): ?>
          <div class="login-errors">
            <?= $userLogin->getLoginErrors() ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . "/footer.php" ?>