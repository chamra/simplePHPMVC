<?php

//requiring external files
require ('libs/Model.php');
require ('libs/Controller.php');
require ('libs/Handler.php');
require ('libs/View.php');
require ('libs/Session.php');

//defining static paths
define('base_url', 'http://localhost/final/');

/**
 * Staring the application by managin the URLs
 */
$app = new Handler();
