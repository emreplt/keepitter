<?php
/**
 * help controller
 */
class help extends Controller
{

  function __construct()
  {
    parent::__construct();
    echo $this->view->render('help/index');
  }

  public function other($arg=false)
  {
    echo "we are inside other";
    echo "optional:".$arg;
    require 'models/help_model.php';
    $model = new help_Model();
    $this->view->blah=$model->blah();
  }
}

 ?>
