<?php


// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
// DANGER! This is insecure. See http://twil.io/secure
$sid    = "AC4c44a7dc188a204ccac7fc4b9afc3590";
$token  = "85237d917b5c889d20e11322755b71b4";
$twilio = new Client($sid, $token);

$messages = $twilio->messages
                   ->read(array(
                   			  "dateSent" => new \DateTime('2019-5-1'),
                   			  // "dateSentBefore" => new \DateTime('2019-4-30'),
                        //       "dateSentAfter" => new \DateTime('2019-1-1')
                              "from" => "+13126180668",
                              "to" => "+18722053869"
                          ),
                          150
                   );
// $help = array();
foreach ($messages as $record) {
	print($record->sid);
}

// foreach ($messages as $record) {
//     $help[]=$record->body;
// }
// // print($record);

// $record = array_map('strval', $record);

// // // echo implode( ", ", $record );
// // // echo count(array_keys($messages, 'Done!'));

// $counts = array_count_values($help);
// echo "You've completed ".$counts["Done!"]." WSJ reading habits today!
// You've completed ".$counts["Yes ma'am!"]." gym habits today!";

// var_dump($help);

// $oldmessages= array("SM5b0cbba2bed2204630fd924b202f107e","SMdd98755b42d1656f8451ce134c5c5ec1");

// foreach ($oldmessages as $values) {
// 	$twilio->messages($values)
//        ->delete();
// }

// //delete single sid
// 	$twilio->messages("SM0bc7c3619dce1a44e1ec316abc256ca2")
//        ->delete();


// $message = $twilio->messages("SM7f0a90d5ec4873f877ffe9bd8d495b51")
//                   ->fetch();
// print($message->body);

// <?php

// // Update the path below to your autoload.php,
// // see https://getcomposer.org/doc/01-basic-usage.md
// require_once 'vendor/autoload.php';

// use Twilio\Rest\Client;

// // Find your Account Sid and Auth Token at twilio.com/console
// // DANGER! This is insecure. See http://twil.io/secure
// $sid    = "AC4c44a7dc188a204ccac7fc4b9afc3590";
// $token  = "85237d917b5c889d20e11322755b71b4";
// $twilio = new Client($sid, $token);

// $messages = $twilio->messages
//                    ->read(array(), 20);

// foreach ($messages as $record) {
//     print($record->sid);
// }