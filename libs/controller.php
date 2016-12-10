<?php
/**
 *
 */
class Controller
{
  function __construct()
  {
    $this->view=new View();


  }

  public function loadModel($name)
  {
    $modelpath='models/'.$name.'_model.php';
    if (file_exists($modelpath)) {
      require $modelpath;
      $modelname = $name.'_model';
      $this->model = new $modelname();
    }
  }
}
 ?>
