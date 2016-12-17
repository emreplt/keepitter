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

  function index()
  {
    echo $this->view->render('index');
  }
}


 ?>
