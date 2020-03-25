<?php
session_start();
include '../class/Database.php';
include '../class/Customer.php';

$db = new Database();
$db = $db->connection();

$insert = new Customer($db);
$array = json_decode($_SESSION['login'], true);
$id = $array['id'];

$insert = $insert->insertFamilyApplication($_POST, $id);

echo $insert;
// echo $_POST['to_array'][0][0]['name'];
// echo count($_POST['to_array'][1]);
?>