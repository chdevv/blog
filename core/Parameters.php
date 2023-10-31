<?php

namespace core;

use src\class\Url;

class Parameters{ 

  public static function getParameters(){
    $url = Url::getUrl();
    $arrayUrl = explode("/",$url);
    $arrayUrlParameters = array_slice($arrayUrl,3);
    
    return $arrayUrlParameters;
  }

}