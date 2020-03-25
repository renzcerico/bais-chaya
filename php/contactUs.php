<?php
    
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

$html = "<html>
          <head>
          <title>Bais Chaya Academy</title>
          </head>
          <body>
          	  <h1>Bais Chaya Academy</h1>
              <p>Name: $name</p>
              <p>Phone: $phone</p>
              <p>Email: $email</p>
              <p>Message: $message</p>
          </body>
          </html>
          ";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Bais Chaya Academy";

$subject = "Bais Chaya Academy";

$to = 'kirshymedia@gmail.com';

mail($to, $subject, $html, $headers);

?>