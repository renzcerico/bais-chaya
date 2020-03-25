<?php
session_start();
include '../class/Database.php';
include '../class/Child.php';

$db = new Database();
$db = $db->connection();

$insert = new Child($db);
$array = json_decode($_SESSION['login'], true);
$id = $array['id'];

$insert = $insert->insert($_POST, $id);

echo $insert;
?>