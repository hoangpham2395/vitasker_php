<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "vitasker";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
mysqli_query($conn, "SET NAMES 'utf8'");
?>