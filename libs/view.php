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
    $pug = new Pug(array(
      'extension' => '.pug',
      'prettyprint' => true
    ));
    $file='views/'.$name.'.pug';
    return $pug->render($file,array(title=> 'hello world'));
  }
}


 ?>
