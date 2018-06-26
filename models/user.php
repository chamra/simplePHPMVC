<?php

/**
 * Handle the application logic for database user table
 */
class User extends Model
{
  public function login($username , $password)
  {

    $query = $this->database->prepare("SELECT id, username , email , name , active FROM `user` WHERE `user`.username = :username AND `user`.`password` = md5(:password)");

    $query->execute([
      ':username' => $username,
      ':password' => $password,
    ]);

    if (isset($query->errorInfo()[2])) {
      return $query->errorInfo()[2];
      die();
    }

    $count = $query->rowCount();

    if ($count == 0) {
      return false;
    }

    return  json_encode($query->fetchAll()[0]);

  }

  public function getAll()
  {
    $query = $this->database->prepare("SELECT id, username, email , name , active FROM `user`");

    $query->execute();

    return $query->fetchAll();
  }

  public function store(array $data)
  {
    $query = $this->database->prepare("INSERT INTO `user` (`name`, `email`, `username`, `password`) VALUES (:name, :email, :username, :password)");

    $query->execute($data);

    if (isset($query->errorInfo()[2])) {
      echo $query->errorInfo()[2];
      die();
    }
  }

  public function find($id)
  {
    $query = $this->database->prepare("SELECT id, username, email , name , active FROM `user` WHERE `user`.id = :id");

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

  public function update(array $data)
  {

    $statment = "UPDATE `user` SET `name`= :name, `email`= :email, `username`= :username  WHERE (`id`=:id)";

    if (isset($data['password'])) {
      $statment = "UPDATE `user` SET `name`= :name, `email`= :email, `username`= :username, `password`= :password WHERE (`id`=:id)";
    }

    $query = $this->database->prepare($statment);

    $query->execute($data);

    if (isset($query->errorInfo()[2])) {
      echo $query->errorInfo()[2];
      die();
    }

  }

  public function delete($id)
  {
    // DELETE FROM `user` WHERE (`id`='4')

    $query = $this->database->prepare("DELETE FROM `user` WHERE (`id`= :id)");

    $query->execute(['id' => $id]);

    if (isset($query->errorInfo()[2])) {
      echo $query->errorInfo()[2];
      die();
    }
  }

  public function changeStatus($status , $id)
  {
    $query = $this->database->prepare("UPDATE `user` SET `active`= :active WHERE (`id`=:id)");

    $query->execute([
      ':active' => $status,
      ':id' => $id,
    ]);

    if (isset($query->errorInfo()[2])) {
      echo $query->errorInfo()[2];
      die();
    }
  }

}
