<?php

$dbServer = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbDatabase = 'hilibi_stock';
$conn = mysqli_connect($dbServer,$dbUser,$dbPass,$dbDatabase);
if(!$conn){
    die('Connection Failed...');
}
?>