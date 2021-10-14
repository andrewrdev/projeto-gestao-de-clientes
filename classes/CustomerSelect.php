<?php

namespace classes;

use PDO;

class CustomerSelect {
  
  public function getAll() {
    $database = new Database();
    $conn = $database->connect();
    $stmt = $conn->prepare("SELECT id, nome, endereco, cidade, estado, telefone, email FROM clientes ORDER BY nome ASC");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
  }

  public function getByID($id) {
    $database = new Database();
    $conn = $database->connect();
    $stmt = $conn->prepare("SELECT id, nome, endereco, cidade, estado, telefone, email FROM clientes WHERE id = ?");
    $stmt->execute(array($id));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
  }

}