<?php

/**
 * Dashboard Controller Class
 */
class Dashboard extends Controller
{

  function __construct()
  {
    Session::init();

    if (!Session::get('user')) {
      header("Location: ".base_url.'login');
    }

    parent::__construct();
  }

  public function index()
  {
    $this->view->render('dashboard');
  }

  public function fun($num)
  {
    echo "fun";
    echo $num;
  }
}
