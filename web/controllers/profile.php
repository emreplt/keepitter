<?php

/**
 *
 */
class profile extends Controller
{

  function __construct()
  {
    parent::__construct();
    session::init();
    $loggedIn = session::get('loggedIn');
    if (!$loggedIn) {
      session::destroy();
      header('location: login');
      exit;
    }

  }

  function index()
  {
    echo $this->view->render('profile/index');
  }
}


 ?>
