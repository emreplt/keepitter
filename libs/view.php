<?php
/**
 *
 */
use Pug\Pug;
class View
{

  function __construct()
  {

  }

  public function render($name)
  {
    $file='views/'.$name.'.pug';
    if (file_exists($file)) {
      $pug = new Pug(array(
        'extension' => '.pug',
        'prettyprint' => true
      ));
      return $pug->render($file,array(title=> 'hello world'));
    }
    //
    // return $pug->render($file,array(title=> 'hello world'));
  }
}


 ?>
