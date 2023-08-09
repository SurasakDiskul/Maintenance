<?php 

define('DB_NAME', 'cjlinfoc_chj_service');
define("DB_USER", "cjlinfoc");
define("DB_PASS", "333cjChowjung");
define("DB_HOST", "localhost");

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");

date_default_timezone_set('Asia/Bangkok');
?>

