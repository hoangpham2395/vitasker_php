<?php
ob_start();
session_start();

include_once('../../configuration/connect.php');

$job_id = $_GET['id'];

$sql = "DELETE FROM job WHERE job_id = $job_id";
$sql_fb = "DELETE FROM fboders WHERE job_id = $job_id";
mysqli_query($conn, $sql);
mysqli_query($conn, $sql_fb);
mysqli_close($conn);
header('location:../../index.php?page_layout=jobs');
?>