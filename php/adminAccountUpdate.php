<?php
session_start();
include '../class/Database.php';
include '../class/Admin.php';

$db = new Database();
$db = $db->connection();

$account = new Admin($db);

// $id = $_POST['id'];

$account = $account->adminUpdate($_POST);

// echo $account;

?>