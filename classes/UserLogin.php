<?php

namespace classes;

use PDO;

class UserLogin {

  private $userName = null;
  private $userPass = null;
  private $loginErros = "";

  // Getters & Setters
  public function getUserName() {
    return $this->userName;
  }

  public function setUserName($userName) {
    $this->userName = $userName; 
  }

  public function getUserPass() {
    return $this->userPass;
  }

  public function setUserPass($userPass) {
    $this->userPass = $userPass; 
  }

  public function getLoginErrors() {
    return $this->loginErros;
  }

  public function setLoginErrors($error) {
    $this->loginErros .= $error . "<br>";
  }

  // Login
  public function login() {

    if(filter_input(INPUT_POST, "name") && filter_input(INPUT_POST, "password") && filter_input(INPUT_POST, "submit")) {

      // User input data
      $userName = $this->getUserName();
      $userPass = $this->getUserPass();
      // Database
      $database = new Database();
      $conn = $database->connect();
      $stmt = $conn->prepare("SELECT userName, userPass, userID FROM users WHERE userName = ? LIMIT 1");
      $stmt->execute(array($userName));

      // If user exists
      if($stmt->rowCount() > 0) {
        $resultData = $stmt->fetch(PDO::FETCH_ASSOC);
        $passHash = $resultData["userPass"];
        
        // Verify user password
        if(password_verify($userPass, $passHash)) {

          // Close connection
          $database->close();

          // if true, user login
          $_SESSION["userID"] = $resultData["userID"];
          header("Location: " . BASE_URL);
          exit;

        } else {
          $this->setLoginErrors("Usuário ou senha inválidos");
        }

      } else {
        $this->setLoginErrors("Usuário ou senha inválidos");
      }

    } else {
      $this->setLoginErrors("* Preencha todos os campos");
    }

  }

  // Logout
  public function logout() {

    unset($_SESSION["userID"]);
    header("Location: " . BASE_URL . "/login");
    exit;

  }

}