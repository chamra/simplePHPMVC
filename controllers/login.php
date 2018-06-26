<?php
//require files
require ('models/user.php');

/**
 * Retun the view for the lading page
 */
class Login extends Controller
{
  function __construct()
  {
    Session::init();
    if (Session::get('user')) {
      header('Location: '.base_url.'dashboard');
    }

    parent::__construct();
  }

  public function index()
  {
    $this->view->js = ['assets/js/login.js'];
    return $this->view->render('login', false);
  }

  public function log_user()
  {

    $validates =  $this->validation->run($_POST, ['username' => 'required' , 'password' => 'required']);


    if (count($validates)) {
      http_response_code(422);
      echo  json_encode($validates);
    }
    $user = new User();

    $login = $user->login($_POST['username'], $_POST['password']);

    if ($login) {
      Session::set('user',$login);
      http_response_code(200);
      echo json_encode(['success' => ['msg' => "logging success"]]);
      die();
    }

    http_response_code(405);
    echo  json_encode(['error' => ['msg' => 'Username password did not match']]);
  }

}
