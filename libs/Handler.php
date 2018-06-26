<?php
//requiring external files
require('controllers/landing.php');

/**
 * Manage all url set to the application
 */
class Handler
{

  function __construct()
  {
    //checking if request to view the landing page
    if (!isset($_GET['url'])) {
      $landingPage = new Landing();
      return $landingPage->index();
    }

    //get url using php GET globle array and sanitizing
    $url = $_GET['url'];
    $url = rtrim($url, '/');
    $url = explode('/', $url);


    //looking for the controller file and verify file exists
    $file = 'controllers/'.$url[0].'.php';
    if (!file_exists($file)) {
      $error = new Error();
      die();
    }

    //requiring the controller dynamicaly
    require $file;

    //creating an object dynamicaly from the
    //dynamicaly required controller file
    $controller = new $url[0];

    //if the url has parameter for the method
    //in the controller
    if (isset($url[2])) {
      $method = $url[1];
      return $controller->$method($url[2]);
    }

    //if the url only has the method name
    if (isset($url[1])) {
      $method = $url[1];
      return $controller->$method();
    }

    //if only the url has the controller name
    return $controller->index();

  }
}
