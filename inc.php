<?php
session_start();

$_MYSQL_HOST = "localhost";
$_MYSQL_USER = "root";
$_MYSQL_PASS = "";
$_MYSQL_DB = "learnphp";

$connect = mysql_connect($_MYSQL_HOST, $_MYSQL_USER, $_MYSQL_PASS ) or die(mysql_error());
mysql_select_db($_MYSQL_DB);

?>