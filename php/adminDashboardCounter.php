<?php
session_start();
include '../class/Database.php';
include '../class/Admin.php';

$db = new Database();
$db = $db->connection();

$login = new Admin($db);

$object = json_decode($_SESSION['login'], true);
$id = $object['id'];

$login = $login->dashboardCount($id);

echo json_encode($login);

?>