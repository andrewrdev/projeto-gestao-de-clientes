<?php

namespace classes;

class Security {
  
  // Check User Login
  public static function checkUserLogin() {
    if(isset($_SESSION["userID"]) && !empty($_SESSION["userID"])) {
      return true;
    } else {
      header("Location: " . BASE_URL . "/login");
      exit;
    }
  }

}