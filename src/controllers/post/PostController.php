<?php

namespace src\controllers\post;
use src\controllers\BaseController;
use src\view\ViewBase;
use src\model\Postagens;  
use core\Parameters;

class PostController extends BaseController{
  public function show(){
    $id = Parameters::getParameters();
    $passbyparameter = [":id" => $id[0]];
    $dataPostReturn = Postagens::getPostagem("SELECT id,titulo,conteudo FROM  postagem WHERE id = :id", $passbyparameter);
    $this->initViewController(basename(__DIR__),$dataPostReturn);
  }
}