<?php
session_start();
include '../class/Database.php';
include '../class/Email.php';

$db = new Database();
$db = $db->connection();

$insert = new Email($db);

$insert = $insert->insert($_POST);

echo $insert;
?>