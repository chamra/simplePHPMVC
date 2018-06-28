<?php

//requiring external files
require('bootstrap/autoload.php');

//defining static paths
define('base_url', 'http://localhost/SimplePHPMVC/');

/**
 * Staring the application by managin the URLs
 */
$app = new Handler();
