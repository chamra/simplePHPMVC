<?php

/**
 * Database init class which is extends from the
 * PHP PDD class
 */
class Database extends PDO
{

  function __construct()
  {
    parent::__construct('mysql:host=localhost;dbname=project', 'root' , '');
  }
}
