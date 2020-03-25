<?php
session_start();
include '../class/Database.php';
include '../class/Customer.php';

$id = $_POST['id'];

$db = new Database();
$db = $db->connection();

$parents = new Customer($db);

// $array = json_decode($_SESSION['login'], true);
// $id = $array['id'];

$parents = $parents->familyApplication($id);

// $parents = $parents->fetch(PDO::FETCH_ASSOC);

echo json_encode($parents);

?>