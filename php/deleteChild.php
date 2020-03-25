<?php
session_start();
include '../class/Database.php';
include '../class/Child.php';

$db = new Database();
$db = $db->connection();

$delete = new Child($db);

$delete = $delete->delete($_POST['id']);

echo $delete;
?>