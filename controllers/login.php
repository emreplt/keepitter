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
    echo $this->view->render('login/index');
  }

  function run()
  {
    $this->model->run();
  }

  function create()
  {
    echo $this->view->render('login/create');
  }

  function authorize()
  {
    $this->model->authorize();
  }

  function callback()
  {
    $this->model->callback();
  }
}
 ?>
