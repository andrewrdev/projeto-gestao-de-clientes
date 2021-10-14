<?php

namespace classes;

class CustomerRegister {

  private $name;
  private $address;
  private $city;
  private $state;
  private $phone;
  private $mail;
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

  public function getMessages() {
    return $this->messages;
  }

  public function setMessages($message) {
    $this->messages = $message;
  }

  // Register

  public function register() {
    if(filter_input(INPUT_POST, "name") && filter_input(INPUT_POST, "phone") && filter_input(INPUT_POST, "submit")) {

      $name = $this->getName();
      $address = $this->getAddress();
      $city = $this->getCity();
      $state = $this->getState();
      $phone = $this->getPhone();
      $mail = $this->getMail();

      $database = new Database();
      $conn = $database->connect();
      $stmt = $conn->prepare("INSERT INTO clientes (nome, endereco, cidade, estado, telefone, email) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->execute(array($name, $address, $city, $state, $phone, $mail));
      $this->setMessages("Cliente inserido com sucesso");
    }
  }
}