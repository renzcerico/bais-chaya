<?php
session_start();
include '../class/Database.php';
include '../class/Admin.php';

$db = new Database();
$db = $db->connection();

$admin = new Admin($db);

$admin = $admin->getProfileById($_POST['id']);

$admin = $admin->fetch(PDO::FETCH_ASSOC);

echo json_encode($admin);

?>