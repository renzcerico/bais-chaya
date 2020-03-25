<?php
session_start();
include '../class/Database.php';
include '../class/Email.php';

$db = new Database();
$db = $db->connection();

$delete = new Email($db);

$delete = $delete->deleteTemplate($_POST['id']);

echo $delete;
?>