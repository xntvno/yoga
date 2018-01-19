<?php
ob_start();
session_start();

error_reporting(1);
ini_set('display_errors', 'On');
define('root', true);

require 'core/config.php';
require 'core/class.auth.php';
$auth = new authentication();

($auth->info["status"]) ? require './admin.php' : require './login.php';
?>