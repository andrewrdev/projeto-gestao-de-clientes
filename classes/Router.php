<?php

namespace classes;

class Router {

  // Render Views
  public static function render($fileView) {
    if(file_exists(__DIR__ . "/../views/" . $fileView . ".php")) {
      require_once __DIR__ . "/../views/" . $fileView . ".php";
    }
  }

}