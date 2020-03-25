<?php
session_start();

if (!isset($_SESSION['login'])) {
	header('location: index.php');
}

// echo $_SESSION['login'];

?>