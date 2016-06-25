<?php
/**
 *
 */
class app
{
  function __construct()
  {
    $url = explode('/', rtrim($_GET['url'],'/'));

    if (empty($url[0])) $url[0]='index';
    // print_r($url);

    $file = 'controllers/' . $url[0] .'.php';
    if (file_exists($file)) {
      require $file;
    } else {
      require 'controllers/error.php';
      $controller = new error();
      return false;
    }

    $controller = new $url[0];

    if (isset($url[2])) {
      $controller->{$url[1]}($url[2]);
    } else {
      if (isset($url[1])) {
        $controller->{$url[1]}();
      }
    }
  }
}


 ?>
