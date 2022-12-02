<?php

class StringUtil{

  static private $stringContainer = [];

  static public function convertTitle($stringText)
  {
    self::$stringContainer = [];

    $arrString = explode(' ', $stringText);
    foreach($arrString as $at){
      self::$stringContainer[] = strtoupper($at[0]) . strtolower(substr($at, 1));
    }

    return implode(" ", self::$stringContainer);
  }
}