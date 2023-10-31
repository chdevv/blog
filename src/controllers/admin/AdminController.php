<?php 

namespace src\controllers\admin;

use src\model\Postagens;
use src\controllers\BaseController;
use core\Parameters;


class AdminController extends BaseController{
  public function index(){
    $dadosPost = Postagens::getPostagens("SELECT id,titulo FROM postagem");
    $this->initViewController(basename(__DIR__), $dadosPost);
  }

  public function newPost($dataNewPost = false){
    if($dataNewPost){
      $databyparameter = [
        ":titulo" => $dataNewPost["titulo"],
        ":conteudo" => $dataNewPost["conteudo"]
      ];
      $changedlines = Postagens::insertNewPost(
        "INSERT INTO postagem VALUES (DEFAULT, :titulo, :conteudo)"
        , $databyparameter
      );
      echo json_encode(array("resultModify" => $changedlines));
    }else{
      $this->initViewController("newPost");
    }
  }

  public function delete($dados = ""){
    $id = Parameters::getParameters();
    $dataPassByParameter = [":id" => $id[0]];
    $changedlines = Postagens::deletePost("DELETE FROM postagem WHERE id = :id", $dataPassByParameter);
    echo json_encode(array("resultModify" => $changedlines));
  }

  public function alter($dataForAlter = ""){
    if($dataForAlter){
      $dataPassByParameter = [
        ":titulo" => $dataForAlter["titulo"],
        ":conteudo" => $dataForAlter["conteudo"],
        ":id" => $dataForAlter["id"]
      ];
      $changedlines = Postagens::alterPost("UPDATE postagem SET titulo = :titulo, conteudo = :conteudo WHERE id = :id", $dataPassByParameter);
      echo json_encode(array("resultModify" => $changedlines));
    }else{
      $id = Parameters::getParameters();
      $idPassByParameter = [":id" => $id[0]];
      $dataPost = Postagens::getPostagem("SELECT id,titulo,conteudo FROM postagem WHERE id = :id", $idPassByParameter);
      $this->initViewController("alterPost", $dataPost);
    }   
  }
}