<?php
session_start();
include '../class/Database.php';
include '../class/Admin.php';

$db = new Database();
$db = $db->connection();

$insert = new Admin($db);

$insert = $insert->insertAdmin($_POST);

echo $insert;
?>