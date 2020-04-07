<?php

include '../class/Database.php';
require 'session1.php';
include '../class/Email.php';

$db = new Database();
$db = $db->connection();

$parent_email = new Email($db);

$parent_email = $parent_email->getAllEmail();

$parent_email = $parent_email->fetchAll(PDO::FETCH_ASSOC);



$parent = $_POST['parent'];
$subject = $_POST['subject'];
$body = $_POST['body'];

if ($parent == 'ALL'){
	 $x = 0;
	 $allprents = array();
  	 while ($x < count($parent_email)) {
  	 	$allprents []= $parent_email[$x]['email_address'];
  	 	$x++;
  	 }
	$parent = json_encode($allprents);
}
else{
	 // echo json_encode($parent);	
}
$html = "<html>
          <head>
          <title>Bais Chaya Academy</title>
          </head>
          <body>
          	  $body
          </body>
          </html>
          ";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Bais Chaya Academy";

$subject = $subject;

$to = $parent;

mail($to, $subject, $html, $headers);

?>