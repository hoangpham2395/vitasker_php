<?php
session_start();
if(isset($_SESSION['username'])){
	session_unset($_SESSION['username']);
	header('location:login.php');
}

?>