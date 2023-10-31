<?php

namespace src\model;
use src\model\Conexao;
use src\traits\TraitModel;

class Postagens{
  use TraitModel;
  public static function getPostagens($sql){
    $resultAllPosts = self::readAll($sql);
    return $resultAllPosts;
  }

  public static function getPostagem($sql, $dataPassByParameter){
    $resultPost = self::read($sql, $dataPassByParameter);
    return $resultPost;
  }

  public static function insertNewPost($sql, $dataForNewPost){
    $changedlines = self::insert($sql,$dataForNewPost);
    return $changedlines;
  }

  public static function deletePost($sql, $idPassByParameter){
    $changedlines = self::delete($sql, $idPassByParameter);
    return $changedlines;
  }

  public static function alterPost($sql, $dataPassByParameter){
    $changedlines = self::alter($sql, $dataPassByParameter);
    return $changedlines;
  }
  
}