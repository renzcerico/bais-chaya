<?php
session_start();
include '../class/Database.php';
include '../class/Customer.php';

$db = new Database();
$db = $db->connection();

$parents = new Customer($db);

$parents = $parents->getMyProfile($_POST['id'], $_POST['user_level']);

$parents = $parents->fetch(PDO::FETCH_ASSOC);

echo json_encode($parents);

?>