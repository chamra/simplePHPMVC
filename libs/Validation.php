<?php

/**
 * Validation Form values
 */
class Validation
{
  public function run($data , $rules)
  {
    $error = [];

    //looping though the given rules
    foreach ($rules as $field => $rule) {
      //getting the multiple condition in a rule
      $conditions = explode('|', $rule);
      $messages = [];

      foreach ($conditions as $condition) {
        //defining dynamic methods
        $validationMethod = $condition."Validation";
        //calling relavent validation method and getting the error messages
        $message = $this->$validationMethod($data, $field);

        //adding to $message array if these is an error
        if ($message) {
          array_push($messages , $message);
        }
      }

      //adding to the error array if there is error messages
      if (count($messages)) {
        array_push($error,[$field => $messages]);
      }

    }

    return $error;
  }

  //method to validate the field
  public function requiredValidation($data , $field)
  {
    // echo $data[$field];
    if (!isset($data[$field])) {
      return $field." is required";
    }

    if ($data[$field] == "") {
      return $field." is required";
    }

    return false;
  }

  public function emailValidation($data , $field)
  {
    if (!isset($data[$field])) {
      return $field." is not a valid email";
    }

    if (!filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
      return $field." is not a valid email";
    }

    return false;
  }

  public function confirmValidation($data , $field)
  {
    if (!isset($data[$field])) {
      return false;
    }
    
    if ($data[$field] != $data['password_confirmation']) {
      return $field." did not match";
    }

    return false;
  }

}
