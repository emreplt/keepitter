<?php
/**
 *
 */
class View
{

  function __construct()
  {
    session::init();
  }

  public function render($name)
  {
    $file='views/'.$name.'.php';
    if (file_exists($file)) {
      require 'views/header.php';
      require $file;
      require 'views/footer.php';
    }
    // $file='views/'.$name.'.pug';
    // if (file_exists($file)) {
    //   $pug = new Pug(array(
    //     'extension' => '.pug',
    //     'prettyprint' => true
    //   ));
    //   return $pug->render($file);
    // }
  }
}

 ?>
