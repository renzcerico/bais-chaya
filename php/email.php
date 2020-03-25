<?php
session_start();
include '../class/Database.php';
include '../class/Customer.php';

$db = new Database();
$db = $db->connection();

$login = new Customer($db);

$login = $login->email($_POST['email']);

echo $login;

?>