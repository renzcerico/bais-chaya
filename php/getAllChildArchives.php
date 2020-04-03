<?php
session_start();
include '../class/Database.php';
include '../class/Customer.php';

$db = new Database();
$db = $db->connection();

$child = new Customer($db);

$child = $child->getAllChildArchives($_POST['year']);

$child = $child->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($child);

?>