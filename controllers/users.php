<?php
//require files
require ('models/user.php');

/**
 * Retun the view for the lading page
 */
class Users extends Controller
{

  private $user;

  function __construct()
  {
    Session::init();

    if (!Session::get('user')) {
      header('Location: '.base_url.'dashboard');
    }

    parent::__construct();

    $this->user = new User();
  }

  public function index()
  {
    $this->view->js = ['assets/js/users.js'];
    $this->view->data['users'] = $this->user->getAll();
    return $this->view->render('users/index');
  }

  public function create()
  {
    $this->view->js = ['assets/js/users.js'];
    return $this->view->render('users/create');
  }

  public function store()
  {
    $validates =  $this->validation->run($_POST, [
       'username' => 'required' ,
       'name' => 'required' ,
       'password' => 'required|confirm',
       'email' => 'required|email',
     ]);


    if (count($validates)) {
      http_response_code(422);
      echo  json_encode($validates);
      die();
    }

    $this->user->store([
      ':name' => $_POST['name'],
      ':email' => $_POST['email'],
      ':password' => md5($_POST['password']),
      ':username' => $_POST['username'],
    ]);

    http_response_code(200);
    echo json_encode(['success' => ['msg' => "user created successfully"]]);
    die();
  }

  public function edit($id)
  {
    $user = $this->user->find($id);

    if (!$user) {
      return header("Location: ".base_url."users");
    }

    $this->view->js = ['assets/js/users.js'];
    $this->view->data['user'] = $user;
    return $this->view->render('users/edit');
  }

  public function update()
  {
    $validates =  $this->validation->run($_POST, [
       'id' => 'required' ,
       'username' => 'required' ,
       'name' => 'required' ,
       'password' => 'confirm',
       'email' => 'required|email',
     ]);


    if (count($validates)) {
      http_response_code(422);
      echo  json_encode($validates);
      die();
    }

    $data = [
      ':id' => $_POST['id'],
      ':name' => $_POST['name'],
      ':email' => $_POST['email'],
      ':username' => $_POST['username'],
    ];

    if (!empty($_POST['password'])) {
      $data[':password'] = md5($_POST['password']);
    }

    $this->user->update($data);

    http_response_code(200);
    echo json_encode(['success' => ['msg' => "user udpated successfully"]]);
    die();
  }

  public function delete($id)
  {
    $user = $this->user->find($id);

    if (!$user) {
      return header("Location: ".base_url."users");
    }

    $this->user->delete($id);

    http_response_code(200);
    echo json_encode(['success' => ['msg' => "user deleted successfully"]]);
    die();
  }

  public function status($id)
  {
    $user = $this->user->find($id);

    if (!$user) {
      return header("Location: ".base_url."users");
    }

    $status  =  (int) !$user['active'];

    $this->user->changeStatus($status, $id);

     header('Location: '.base_url.'users');
     die();
  }

}
