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
