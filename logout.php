<?php
session_start();

if(isset($_SESSION['login']) == true) {
	session_destroy();
	header('location: index.php');
}
?>