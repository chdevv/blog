<?php

namespace src\controllers\home;

use src\view\ViewBase;
use src\controllers\BaseController;
use core\Parameters;
use src\model\Postagens;


class HomeController extends BaseController{

  public function index(){
    $dadosPosts = Postagens::getPostagens("SELECT id,titulo,conteudo FROM postagem");
    $this->initViewController(basename(__DIR__), $dadosPosts);
  }
}