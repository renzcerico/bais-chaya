<?php
session_start();
include '../class/Database.php';
include '../class/Admin.php';

$db = new Database();
$db = $db->connection();

$admin = new Admin($db);

$admin = $admin->getAllAdmin();

$admin = $admin->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($admin);

?>