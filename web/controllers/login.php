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

  function get_authorize()
  {
    $this->model->authorize();
  }

  function get_callback()
  {
    $this->model->callback();
  }
}
 ?>
