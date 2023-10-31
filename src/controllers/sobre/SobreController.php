<?php

namespace src\controllers\sobre;
use src\controllers\BaseController;
use src\view\ViewBase;

class SobreController extends BaseController{ 
  public function index(){
    $this->initViewController(basename(__DIR__));
  }
}