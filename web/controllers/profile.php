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
      header('location: login/authorize');
      exit;
    }
  }

  function get_index()
  {
    echo $this->view->render('profile/index');
  }

  function get_kill()
  {
    auth::kill();
    header('location: /');
  }
}


 ?>
