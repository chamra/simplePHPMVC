<?php
//require external files
require ('libs/Database.php');
/**
 * Manage the application to the database
 */
class Model
{
    public function __construct()
    {
        $this->database = new Database();
    }
}
