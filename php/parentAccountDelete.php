<?php
session_start();
include '../class/Database.php';
include '../class/Admin.php';

$db = new Database();
$db = $db->connection();

$login = new Admin($db);

$id = $_POST['id'];

$login = $login->parentAccountDelete($id);

?>