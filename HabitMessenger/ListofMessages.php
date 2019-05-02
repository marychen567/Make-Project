<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php

require __DIR__ . '/vendor/autoload.php';
use Twilio\Twiml;

$response = new Twiml;
$body = $_REQUEST['Body'];

$default = "Try again!";


if (strtolower($body) == 'done!') {
	$response->message("Thats great- current events are important!");
}


if (strtolower($body) == "yes ma'am!") {
	$response->message("One step closer to losing the dad bod!");
} 

if (strtolower($body) != 'done!' && strtolower($body) != "yes ma'am!") {
	$response->message($default);
}


print $response;


