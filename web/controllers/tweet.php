<?php
/**
 *
 */
class tweet extends Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->view->render('tweet/index');
  }

  function insert() {

    if (!empty($_POST))
    {
      $this->model->insert();
    } else {
      $this->view->render('tweet/insert');
    }


  }

  function show($id)
  {
    $tweet = $this->model->get_tweet($id);
    // print_r($tweet);
    if ($tweet) {
      $this->view->tweet=$tweet[0];
      $this->view->render('tweet/show');
    } else {
      $this->view->render('tweet/not_found');
    }
  }
}
 ?>
