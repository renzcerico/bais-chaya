<?php
session_start();
include '../class/Database.php';
include '../class/Child.php';

$db = new Database();
$db = $db->connection();

$login = new Child($db);

// $id = $_POST['id'];

$login = $login->update($_POST);

?>