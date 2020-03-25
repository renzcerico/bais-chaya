<?php
session_start();
include '../class/Database.php';
include '../class/Email.php';

$db = new Database();
$db = $db->connection();

$email = new Email($db);

$email = $email->getTemplatesById($_POST['id']);

$email = $email->fetch(PDO::FETCH_ASSOC);

echo json_encode($email);

?>