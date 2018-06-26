<?php

/**
 *
 */
class Supplier extends Model
{
  public function getSelectOptions()
  {
    $query = $this->database->prepare("SELECT id, name FROM `supplier`");

    $query->execute();

    

    return $query->fetchAll();
  }

}
