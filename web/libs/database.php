<?php

/**
 *
 */
class Database extends PDO
{

  function __construct()
  {
    $mydb=getenv("MYSQL_PORT_3306_TCP_ADDR");
    parent::__construct('mysql:host='.$mydb.';dbname=keepitter;charset=utf8mb4', 'root', 'admin');
  }
}


 ?>
