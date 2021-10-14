<?php

namespace classes;

use PDO;
use PDOException;

class Database {

  private $pdo;
  private $dbName = DB_NAME;
  private $dbHost = DB_HOST;
  private $dbUser = DB_USER;
  private $dbPass = DB_PASS;

  // Construct
  public function connect() {
    try {

      // PDO MySQL connection
      $this->pdo = new PDO ("mysql:dbname=" . $this->dbName . ";host=" . $this->dbHost,$this->dbUser,$this->dbPass);

      // set the PDO error mode to exception
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // return connection
      return $this->pdo;
      

    } catch (PDOException $e) {
      echo "Falha na conexão com o banco de dados";
    }
  
  }

  // Close connection
  public function close() {
    $this->pdo = "";
  }

}