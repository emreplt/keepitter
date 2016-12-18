<?php
/**
 *
 */
class index extends Controller
{

  function __construct()
  {
    parent::__construct();
  }

  function get_index()
  {
    echo $this->view->render('index');
  }
}


 ?>
