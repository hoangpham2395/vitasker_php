<?php
ob_start();
session_start();

include_once('../../configuration/connect.php');

$category_id = $_GET['id'];

$sql = "DELETE FROM category WHERE category_id = $category_id";
$sql_fb = "DELETE FROM fboders WHERE category_id = $category_id";
mysqli_query($conn, $sql);
mysqli_query($conn, $sql_fb);
mysqli_close($conn);
header('location:../../index.php?page_layout=categories');
?>