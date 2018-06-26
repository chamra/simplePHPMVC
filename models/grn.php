<?php

/**
 *
 */
class Grn extends Model
{
  public function store($data)
  {
    $query = $this->database->prepare("INSERT INTO `grn` (`supplier_id`, `date`) VALUES (:supplier_id, :date)");

    $query->execute($data);

    return $this->database->lastInsertId();

    if (isset($query->errorInfo()[2])) {
      echo $query->errorInfo()[2];
      die();
    }
  }

  public function storeItems($data)
  {
    $query = $this->database->prepare("INSERT INTO `grn_item` (`grn_id`, `product_id`, `price`, `qty`) VALUES (:grn_id, :product_id, :price, :qty)");

    $query->execute($data);

    if (isset($query->errorInfo()[2])) {
      echo $query->errorInfo()[2];
      die();
    }
  }

  public function updateTotal($grnId , $total)
  {
    $query = $this->database->prepare("UPDATE `grn` SET `total`= :total WHERE (`id`= :id)");

    $query->execute([
      'total' => $total,
      'id' => $grnId
    ]);

    if (isset($query->errorInfo()[2])) {
      echo $query->errorInfo()[2];
      die();
    }
  }

  public function getAll()
  {
    $query = $this->database->prepare("SELECT grn.id, grn.total, grn.date, supplier.`name` as supplier_name FROM grn
        INNER JOIN supplier ON grn.supplier_id = supplier.id");

    $query->execute();

    return $query->fetchAll();
  }

  public function find($id)
  {
    $query = $this->database->prepare("SELECT grn.id, grn.total, DATE_FORMAT(grn.date, '%Y-%m-%d') AS date, grn.supplier_id FROM `grn` WHERE `grn`.id = :id");

    $query->execute([
      ':id' => $id
    ]);


    if (isset($query->errorInfo()[2])) {
      echo $query->errorInfo()[2];
      die();
    }

    if ($query->rowCount() == 0) {
      return false;
    }

    return $query->fetchAll()[0];
  }

  public function findItems($id)
  {
    $query = $this->database->prepare("SELECT grn_item.id, grn_item.grn_id, grn_item.product_id, grn_item.price, grn_item.qty, product.`name` as product_name
      FROM grn_item INNER JOIN product ON grn_item.product_id = product.id WHERE
      grn_item.grn_id = :id");

    $query->execute([
      ':id' => $id
    ]);


    if (isset($query->errorInfo()[2])) {
      echo $query->errorInfo()[2];
      die();
    }

    if ($query->rowCount() == 0) {
      return [];
    }

    return $query->fetchAll();
  }

  public function update(array $data)
  {
    $statment = "UPDATE `grn` SET `supplier_id`= :supplier_id, `date`= :date WHERE (`id`=:id)";

    $query = $this->database->prepare($statment);

    $query->execute($data);

    if (isset($query->errorInfo()[2])) {
      echo $query->errorInfo()[2];
      die();
    }
  }

  public function delete($id)
  {
    $statment = "DELETE FROM `grn` WHERE (`id`=:id)";

    $query = $this->database->prepare($statment);

    $query->execute([':id' => $id]);

    if (isset($query->errorInfo()[2])) {
      echo $query->errorInfo()[2];
      die();
    }
  }

  public function deleteItems($grnId)
  {
    $statment = "DELETE FROM `grn_item` WHERE (`grn_id`=:id)";

    $query = $this->database->prepare($statment);

    $query->execute([':id' => $grnId]);

    if (isset($query->errorInfo()[2])) {
      echo $query->errorInfo()[2];
      die();
    }
  }
}
