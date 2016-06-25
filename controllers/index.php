<?php
/**
 *
 */
class index extends Controller
{

  function __construct()
  {
    parent::__construct();
    
    echo $this->view->render('index');
  }
}


 ?>
