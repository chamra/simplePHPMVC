<?php
require 'models/grn.php';
require 'models/supplier.php';
require 'models/product.php';
/**
 *
 */
class Grns extends Controller
{
  private $grn;

  function __construct()
  {
    Session::init();

    if (!Session::get('user')) {
      header('Location: ' . base_url."dashboard");
    }

    parent::__construct();

    $this->grn = new Grn();
  }

  public function index()
  {
    $this->view->data['grns'] = $this->grn->getAll();
    $this->view->js = ['assets/js/grn.js'];
    return $this->view->render('grn/index');
  }

  public function create()
  {
    $this->view->js = ['assets/js/grn.js'];
    $this->view->data['suppliers'] = (new Supplier)->getSelectOptions();
    $this->view->data['products'] = (new Product)->getSelectOptions();

    return $this->view->render('grn/create');
  }

  public function store()
  {
    $validates =  $this->validation->run($_POST, [
       'supplier_id' => 'required' ,
       'date' => 'required' ,
       'grn_item' => 'required',
     ]);

     if (count($validates)) {
       http_response_code(422);
       echo  json_encode($validates);
       die();
     }

     $grnId = $this->grn->store([
       ':supplier_id' => $_POST['supplier_id'],
       ':date' => $_POST['date'],
     ]);

     $total = 0;

     foreach ($_POST['grn_item'] as $key => $value) {
       $this->grn->storeItems([
         ':grn_id' => $grnId,
         ':product_id' => $value['product_id'],
         ':price' => $value['price'],
         ':qty' => $value['qty'],
       ]);

       $total += ($value['price'] * $value['qty']);
     }

     $this->grn->updateTotal($grnId ,$total);

     http_response_code(200);
     echo json_encode(['success' => ['msg' => "grn created successfully"]]);
     die();
  }

  public function edit($id)
  {
    $grn = $this->grn->find($id);

    if (!$grn) {
      return header("Location: ".base_url."grns");
    }

    $this->view->data['grn'] = $grn;
    $this->view->data['grn_item'] = $this->grn->findItems($id);
    $this->view->data['suppliers'] = (new Supplier)->getSelectOptions();
    $this->view->data['products'] = (new Product)->getSelectOptions();

    $this->view->js = ['assets/js/grn.js'];
    return $this->view->render('grn/edit');
  }

  public function update()
  {
    $validates =  $this->validation->run($_POST, [
       'id' => 'required' ,
       'supplier_id' => 'required' ,
       'date' => 'required' ,
       'grn_item' => 'required',
     ]);


    if (count($validates)) {
      http_response_code(422);
      echo  json_encode($validates);
      die();
    }

    $this->grn->update([
      ':supplier_id' => $_POST['supplier_id'],
      ':date' => $_POST['date'],
      ':id' => $_POST['id'],
    ]);

    $this->grn->deleteItems($_POST['id']);

    $total = 0;

    foreach ($_POST['grn_item'] as $key => $value) {
      $this->grn->storeItems([
        ':grn_id' => $_POST['id'],
        ':product_id' => $value['product_id'],
        ':price' => $value['price'],
        ':qty' => $value['qty'],
      ]);

      $total += ($value['price'] * $value['qty']);
    }

    $this->grn->updateTotal($_POST['id'] ,$total);

    http_response_code(200);
    echo json_encode(['success' => ['msg' => "grn updated successfully"]]);
    die();
  }

  public function delete($id)
  {
    $grn = $this->grn->find($id);

    if (!$grn) {
      return header("Location: ".base_url."grns");
    }

    $this->grn->delete($id);

    http_response_code(200);
    echo json_encode(['success' => ['msg' => "grn delete successfully"]]);
    die();
  }
}
