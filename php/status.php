<?php
include 'session1.php';

$json = json_decode($_SESSION['login'], true);

$status = $json['status'];

echo $status;

?>