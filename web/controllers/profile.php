<?php

/**
 *
 */
class profile extends Controller
{
  function __construct()
  {
    parent::__construct();
    if (!auth::isauth()) {
      header('location: login/oauth');
      exit;
    }

  }

  function index()
  {
    echo $this->view->render('profile/index');
  }

  function kill()
  {
    auth::kill();
    header('location: /');
  }
}


 ?>
