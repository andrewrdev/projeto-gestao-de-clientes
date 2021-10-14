<?php

namespace classes;

class StringFormat {

  public static function defineLength($text) {
    if(strlen($text) > 10) {
      return mb_substr($text, 0, 20) . "...";
    } else {
      return mb_substr($text, 0, 20);
    }
  }

}