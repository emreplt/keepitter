<?php
/**
 *
 */
class app
{
  function __construct()
  {
    $url = explode('/', filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));  //PARSE URL ! ! !
    if (empty($url[0])) $url[0]='index';  // NO CONTROLLER -> GO TO INDEX

    /*
     * exceptions for goodness
     */
    if ($url[0]==='insert') {
      $url[0]='tweet';
      $url[1]='insert';
    }
    if ($url[1]==='status') {
      $url[0]='tweet';
      $url[1]='show';
    }
    if ($url[0]==='me') {
      $url[0]='profile';
    }

    $file = 'controllers/' . $url[0] .'.php';

    if (!file_exists($file)) {
      $url[0]='error';
      $file = 'controllers/' . $url[0] .'.php';
    }

    require $file;

    $controller = new $url[0];
    $controller->loadModel($url[0]);

    if (isset($url[2])) {
      $controller->{$url[1]}($url[2]);
    } else {
      if (isset($url[1])) {
        $controller->{$url[1]}();
      } else {
        $controller->index();
      }
    }
  }
}


 ?>
