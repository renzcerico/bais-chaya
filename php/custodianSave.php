<?php
session_start();
include '../class/Database.php';
include '../class/Custodian.php';

$db = new Database();
$db = $db->connection();

$insert = new Custodian($db);
$insert = $insert->insert($_POST);

echo $insert;
?>