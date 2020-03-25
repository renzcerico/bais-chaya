<?php
session_start();
include '../class/Database.php';
include '../class/Email.php';

$db = new Database();
$db = $db->connection();

$templates = new Email($db);

$templates = $templates->getTemplates();

$templates = $templates->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($templates);

?>