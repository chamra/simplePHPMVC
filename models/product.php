<?php

/**
 *
 */
class Product extends Model
{
  public  function getSelectOptions()
  {
    $query = $this->database->prepare("SELECT * FROM `product`");

    $query->execute();

    return $query->fetchAll();
  }

}
