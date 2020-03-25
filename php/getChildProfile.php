<?php
session_start();
include '../class/Database.php';
include '../class/Child.php';

$db = new Database();
$db = $db->connection();

$parents = new Child($db);

$parents = $parents->getChildProfile($_POST['id']);

$parents = $parents->fetch(PDO::FETCH_ASSOC);

echo json_encode($parents);

?>