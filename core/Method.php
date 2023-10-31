<?php

namespace core;
use src\class\Url;

class Method{
  private $url;


  public function __construct(){
    $this->url = Url::getUrl();
  }

  public function searchMethod($controller){ 
    $method = $this->getMethod();
    if(method_exists($controller,$method)){
      return $method;
    }
    echo "erro line 17, method not exists";
  }

  private function getMethod(){
    if(substr_count($this->url,"/") > 1){
      list($barra,$controller,$metodo)  = explode("/", $this->url);
      if($metodo){
        return $metodo;
      }
    }
    return "index";
  }
}
