<?php

namespace src\traits;
use src\model\Conexao;

Trait TraitModel{
  public static function insert($sql,$dataPassByParameter){
    $conexao = Conexao::conectar();
    $prepare = $conexao->prepare($sql);
    $prepare->execute($dataPassByParameter);
    $changedlines = $prepare->rowCount();
    return $changedlines;
  }

  public static function readAll($sql){
    $conexao = Conexao::conectar();
    $prepare = $conexao->prepare($sql);
    $prepare->execute();
    $data = $prepare->fetchAll(\PDO::FETCH_ASSOC);
    return $data;
  }

  public static function read($sql, $dataPassByParameter){
    $conexao = Conexao::conectar();
    $prepare = $conexao->prepare($sql);
    $prepare->execute($dataPassByParameter);
    $data = $prepare->fetch(\PDO::FETCH_ASSOC);
    return $data;
  }

  public static function delete($sql, $dataPassByParameter){
    $conexao = Conexao::conectar();
    $prepare = $conexao->prepare($sql);
    $prepare->execute($dataPassByParameter);
    $changedlines = $prepare->rowCount();
    return $changedlines;
  }

  public static function alter($sql, $dataPassByParameter){
    $conexao = Conexao::conectar();
    $prepare = $conexao->prepare($sql);
    $prepare->execute($dataPassByParameter);
    $changedlines = $prepare->rowCount();
    return $changedlines;
  }
}