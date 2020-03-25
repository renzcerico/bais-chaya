<?php
session_start();
include '../class/Database.php';
include '../class/Customer.php';

$db = new Database();
$db = $db->connection();

$verify = new Customer($db);

$json = json_decode($_SESSION['login'], true);

$id = $json['id'];
$code = $_POST['code'];

$verify = $verify->verify($id, $code);

if ($verify == 200) {
	$result = [];

	$result = ['id' => $id, 'status' => 'verified'];
	$_SESSION['login'] = json_encode($result);
	echo 200;
} else {	
	echo 422;
}

?>