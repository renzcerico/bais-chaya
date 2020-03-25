<?php
include '../class/Database.php';
include '../class/Customer.php';

$db = new Database();
$db = $db->connection();

$register = new Customer($db);

$register = $register->insert($_POST);

// echo $register;

header('location: ../index.php');
?>