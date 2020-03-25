<?php
session_start();
include '../class/Database.php';
include '../class/Customer.php';

$db = new Database();
$db = $db->connection();

$parents = new Customer($db);

$parents = $parents->changePassword($_POST);

echo $parents

?>