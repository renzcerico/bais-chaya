<?php
session_start();
include '../class/Database.php';
include '../class/Admin.php';

$db = new Database();
$db = $db->connection();

$parents = new Admin($db);

$object = json_decode($_SESSION['login'], true);
$id = $object['id'];

$parents = $parents->getNewChild($id);

$parents = $parents->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($parents);

?>