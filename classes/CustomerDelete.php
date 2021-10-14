<?php

namespace classes;

class CustomerDelete {

  public function deleteByID($id) {
    $database = new Database();
    $conn = $database->connect();
    $stmt = $conn->prepare("DELETE FROM clientes WHERE id= ?");
    $stmt->execute(array($id));
  }

}