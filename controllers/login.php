<?php
/**
 *
 */
class login extends Controller
{

  function __construct()
  {
    parent::__construct();

  }


  function index()
  {
    require 'models/login_model.php';
    $model = new login_model();
    echo $this->view->render('login/index');
  }
}
 ?>
