<?php
//requiring external files
require('libs/Validation.php');
/**
 * Main Controller Class to the sub controller classes
 */
class Controller
{

  function __construct()
  {
    $this->view = new View();
    $this->validation = new Validation();
  }
}
