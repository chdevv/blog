<?php

require_once "../bootstrap.php";

use core\Controller;
use core\Method;
use src\class\Url;

try{
  if($_SERVER['REQUEST_METHOD'] == "GET"){
    $controller = new Controller();
    $controllerSearch = $controller->searchController();
    $method = new Method();
    $methodSearch = $method->searchMethod($controllerSearch);
    $controllerSearch->$methodSearch();

  }else if ($_SERVER['REQUEST_METHOD'] =="POST"){
    $dados = json_decode(file_get_contents("php://input"),true);
    $controller = new Controller();
    $controllerSearch = $controller->searchController();
    
    $method = new Method();
    $methodSearch = $method->searchMethod($controllerSearch);
    $controllerSearch->$methodSearch($dados);
  }
}catch(\Exception $error){
  dd("erro index: $error");
}

