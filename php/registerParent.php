<?php
include '../class/Database.php';
include '../class/Admin.php';

$db = new Database();
$db = $db->connection();

$register = new Admin($db);

$register = $register->insertParent($_POST);

// echo $register;

header('location: ../admin/parents.php');
?>