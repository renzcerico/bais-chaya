<?php
session_start();
include '../class/Database.php';
include '../class/Customer.php';

$db = new Database();
$db = $db->connection();

$login = new Customer($db);

$login = $login->adminlogin($_POST);

if ($login) {
	$_SESSION['login'] = $login;
	header('location: ../admin/dashboard.php');
} else {	
	header('location: ../admin/index.php');
}

?>