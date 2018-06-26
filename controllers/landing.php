<?php
/**
 * System Landing page (main page)
 */
class Landing extends Controller
{
  function __construct()
  {
    Session::init();
    if (Session::get('user')) {
      header('Location: ' . base_url."dashboard");
    }

    parent::__construct();
  }

  public function index()
  {
    $this->view->render('landing', false);
  }
}
