<?php

// Autoload
require_once __DIR__ . "/../vendor/autoload.php";

use classes\Router;
use classes\Security;

// Define empty route

if(!isset($_GET["route"]) && empty($_GET["route"])) {
  $_GET["route"] = "home";
}

$rota = explode("/", $_GET["route"]);

// Routes

switch ($_GET["route"]) {
  // Home
  case 'home':
  case 'home/':
    Security::checkUserLogin();
    Router::render("home");
    break;
  // Adicionar-cliente
  case 'novo-cliente':
  case 'novo-cliente/':
    Security::checkUserLogin();
    Router::render("novo-cliente");
    break;
  // Editar
  case 'editar':
  case 'editar/':
    Security::checkUserLogin();
    Router::render("editar-cliente");
    break;
  // Ecluir
  case 'excluir':
  case 'excluir/':
    Security::checkUserLogin();
    Router::render("excluir-cliente");
    break;
  // Login
  case 'login':
  case 'login/':
    Router::render("login");
    break;
  // Logout
  case 'logout':
  case 'logout/':
    Router::render("logout");
    break;
  
  default:
    // 404 ERROR
    Router::render("404");
    break;
}