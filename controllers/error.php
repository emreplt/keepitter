<?php
/**
 *
 */
class error extends Controller
{

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    echo $this->view->render('error/index');
  }

  function detailedError($exception='')
  {
    echo $this->view->render('error/index', array($errorEx=>$exception));
  }
}
 ?>
