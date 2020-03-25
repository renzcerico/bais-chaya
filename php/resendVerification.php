<?php
session_start();
include '../class/Database.php';
include '../class/Customer.php';

$db = new Database();
$db = $db->connection();

$login = new Customer($db);

$json = json_decode($_SESSION['login'], true);
$id = $json['id'];

$login = $login->resendVerification($id);

echo $login;

?>