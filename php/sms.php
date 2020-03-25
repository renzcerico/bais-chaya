<?php
require __DIR__ . '/twilio-php-master/src/Twilio/autoload.php';
use Twilio\Rest\Client;

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$middle = $_POST['middle_name'] || '';
$email = $_POST['email'];

$middle = $middle ? $middle . '.' : '';

$sms = $last_name . ' ' . $first_name . ' ' . $middle . '%0a was successfully registered. Email: ' . $email;

$sid = 'AC24f98423aebd3ec40376a43a1885433e';
$token = '9ddcff27d479f5b9d6357d78f9f4aaca';
$client = new Client($sid, $token);
$client->messages->create(
    '+639506044101',
    array(
        'from' => '+17737966131',
        'body' => $sms
    )
);

echo $sms;