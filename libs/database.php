<?php

/**
 *
 */
class Database extends PDO
{

  function __construct()
  {
    parent::__construct('mysql: host=db;dbname=keepitter', 'root', 'admin');
  }
}


 ?>
