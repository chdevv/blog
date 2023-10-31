<?php

namespace src\controllers;
use src\traits\TraitController;
use src\view\ViewBase;

class BaseController{
  use TraitController;

  protected function initViewController($dirFileDinamico, $dadosPosts = []){
    $view = new ViewBase();
    $view->view("estrutura.html","../src/templates/", $dirFileDinamico.".html", $dadosPosts, $dirFileDinamico);
  }
}