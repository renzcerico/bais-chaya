<?php
session_start();
include '../class/Database.php';
include '../class/Child.php';

$db = new Database();
$db = $db->connection();

$insertAdmin = new Child($db);

$insertAdmin = $insertAdmin->insertAdmin($_POST);

echo $insertAdmin;
?>