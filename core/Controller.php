<?php

namespace core;
use src\class\Url;

use src\controllers\home\HomeController; //use padrão no inicio logo para usar no if do searchController, 
//pois facilita, invés de deixar no folderNamespaces.

class Controller{
  private $url;
  private $foldesNamespaces = [
    "src\controllers\home",
    "src\controllers\sobre",
    "src\controllers\admin",
    "src\controllers\post"
  ];
  private $controller;
  private $namespace;

  public function __construct(){
    $this->url = Url::getUrl(); 
  }
  
  private function isHome(){
    return ($this->url == "/");
  }

  public function searchController(){
    if($this->isHome()){
      return new HomeController();
    }
    $controllerInstanciate = $this->searchOtherController(); 
    return $controllerInstanciate;
  }

  private function searchOtherController(){
    $controller = $this->filterUrl();
    if($this->controllerExists($controller)){
      $controllerInstanciate = $this->instanciateController();
      return $controllerInstanciate;
    }
    echo "controller Not Exists. error line 36";
  }
  
  private function controllerExists($controller){
    $controllerExists = false;
    foreach($this->foldesNamespaces as $folder){
      if(class_exists($folder ."\\" . $controller)){
        $controllerExists = true;
        $this->namespace = $folder;
        $this->controller = $controller;
      }
    }
    return $controllerExists;
  }

  private function filterUrl(){
    list($barra,$controller,$metodo) = explode("/", $this->url);
    return ucfirst($controller)."Controller";
  }


  private function instanciateController(){
    $controller = $this->namespace . "\\" . $this->controller;
    return new $controller; 
  }
}