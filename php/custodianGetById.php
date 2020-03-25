<?php
session_start();
include '../class/Database.php';
include '../class/Custodian.php';

$id = $_POST['id'];

$db = new Database();
$db = $db->connection();

$parents = new Custodian($db);

$parents = $parents->getById($id);

echo json_encode($parents);

?>