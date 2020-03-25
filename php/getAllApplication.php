<?php
session_start();
include '../class/Database.php';
include '../class/Customer.php';

$db = new Database();
$db = $db->connection();

$parents = new Customer($db);

$parents = $parents->getFamilyApplication();

$parents = $parents->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($parents);

?>