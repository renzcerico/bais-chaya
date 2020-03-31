<?php
session_start();
include '../class/Database.php';
include '../class/Admin.php';

$db = new Database();
$db = $db->connection();

$child = new Admin($db);

$child = $child->archiveStudent($_POST['year'], $_POST['students']);

echo $child;

?>