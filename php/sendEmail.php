<?php
    
$parent = $_POST['parent'];
$subject = $_POST['subject'];
$body = $_POST['body'];

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