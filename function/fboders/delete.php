<?php
ob_start();
session_start();

include_once('../../configuration/connect.php');

$fb_id = $_GET['id'];

$sql = "DELETE FROM fboders WHERE fb_id = $fb_id";
$sql_fa = "DELETE FROM favorite WHERE fb_id = $fb_id";
mysqli_query($conn, $sql);
mysqli_query($conn, $sql_fa);
mysqli_close($conn);
header('location:../../index.php?page_layout=fboders');
?>