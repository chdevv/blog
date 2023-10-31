<?php

namespace src\model;

include_once "../config.php";

class Conexao{
  private static $instance;

  public static function conectar(){
    if(!isset($instance)){
      self::$instance = new \PDO(
        HOST .
        DBNAME,
        USER,
        PASSWORD
      );
      self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    return self::$instance;
  }
}