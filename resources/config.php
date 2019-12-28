<?php
ob_start(); // to prevent warning like header already sent before
session_start();
// defined('DS') ? null :define('DS',DIRECTORY_SEPARATOR);
defined('TEMPLATE_FRONT') ? null :define('TEMPLATE_FRONT',__DIR__.'/templates/front');
defined('TEMPLATE_BACK') ? null :define('TEMPLATE_BACK',__DIR__.'/templates/back');

// database constants

defined('DB_HOST') ? null : define('DB_HOST','localhost');
defined('DB_USER') ? null : define('DB_USER','root');
defined('DB_PASS') ? null : define('DB_PASS','root12345');
defined('DB_NAME') ? null : define('DB_NAME','ecom_db');


$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if(!$connection){die("Connnection Error");}

require_once("functions.php");


