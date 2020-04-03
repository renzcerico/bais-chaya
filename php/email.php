<?php
session_start();
include '../class/Database.php';
include '../class/Customer.php';

$db = new Database();
$db = $db->connection();

$email = new Customer($db);

$email = $email->email($_POST['email']);

echo $email;

?>