<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'AC4c44a7dc188a204ccac7fc4b9afc3590';
$auth_token = '85237d917b5c889d20e11322755b71b4';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+18722053869";



$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+13126180668',
    array(
        'from' => $twilio_number,
        'body' => "Goodmorning! First habit of the day is skimming WSJ!
        Text 'Done!' when complete"
    )
);

sleep (120);

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+13126180668',
    array(
        'from' => $twilio_number,
        'body' => "Next habit? Time to hit the gym!
        Text 'Yes ma'am!' when complete"
    )
);







