<?php

namespace classes;

class CustomerEdit {

  private $name;
  private $address;
  private $city;
  private $state;
  private $phone;
  private $mail;
  private $id;
  private $messages;

  // Getters & Setters

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getAddress() {
    return $this->address;
  }

  public function setAddress($address) {
    $this->address = $address;
  }

  public function getCity() {
    return $this->city;
  }

  public function setCity($city) {
    $this->city = $city;
  }

  public function getState() {
    return $this->state;
  }

  public function setState($state) {
    $this->state = $state;
  }

  public function getPhone() {
    return $this->phone;
  }

  public function setPhone($phone) {
    $this->phone = $phone;
  }

  public function getMail() {
    return $this->mail;
  }

  public function setMail($mail) {
    $this->mail = $mail;
  }

  public function getID() {
    return $this->id;
  }

  public function setID($id) {
    $this->id = $id;
  }

  public function getMessages() {
    return $this->messages;
  }

  public function setMessages($message) {
    $this->messages = $message;
  }

  // Register

  public function update() {
    if(filter_input(INPUT_POST, "name") && filter_input(INPUT_POST, "phone") && filter_input(INPUT_POST, "submit")) {

      $name = $this->getName();
      $address = $this->getAddress();
      $city = $this->getCity();
      $state = $this->getState();
      $phone = $this->getPhone();
      $mail = $this->getMail();
      $id = $this->getID();

      $database = new Database();
      $conn = $database->connect();
      $stmt = $conn->prepare("UPDATE clientes SET nome= ?, endereco= ?, cidade= ?, estado= ?, telefone= ?, email = ? WHERE id= ?");
      $stmt->execute(array($name, $address, $city, $state, $phone, $mail, $id));
      $this->setMessages("Cliente atualizado com sucesso");
    }
  }

}