<?php
session_start();
include '../class/Database.php';
include '../class/Email.php';

$db = new Database();
$db = $db->connection();

$edit = new Email($db);

$edit = $edit->edit($_POST);

echo $edit;
?>