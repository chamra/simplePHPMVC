<?php

/**
 * Class that handle and return the relevant view
 * file which is requested in the controller
 */
class View
{
  public $data = [];
  public $css = [];
  public $js = [];

  //this method verify the view and return the file
  public function render($view , $include = true)
  {
    $viewPath = 'views/'.$view.'.php';

    //redirect to error page if the
    //file do not exists
    if (!file_exists($viewPath)) {
      // header('Location: ')
      return 'file not exist';
    }

    if ($include) {
      require('views/includes/header.php');
      require($viewPath);
      require('views/includes/footer.php');
      exit;
    }

    //requiring the view file dynamicaly
    require($viewPath);
  }


}
