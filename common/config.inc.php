<?php
//error_reporting(E_ALL ^ E_DEPRECATED);

error_reporting(0);

$database_host = "localhost";
$username = "root";
$password = "";
$dbname="calculator_exercise";

//Connect to the database

$connection=($GLOBALS["___mysqli_ston"] = mysqli_connect($database_host,  $username,  $password));
((bool)mysqli_query($GLOBALS["___mysqli_ston"], "USE $dbname"));
?>