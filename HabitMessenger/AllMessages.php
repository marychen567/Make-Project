<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;
use Twilio\TwiML;

// Find your Account Sid and Auth Token at twilio.com/console
// DANGER! This is insecure. See http://twil.io/secure

https://api.twilio.com/2010-04-01/Accounts/AC4c44a7dc188a204ccac7fc4b9afc3590/Messages.json

$sid    = "AC4c44a7dc188a204ccac7fc4b9afc3590";
$token  = "85237d917b5c889d20e11322755b71b4";
$twilio = new Client($sid, $token);


$messages = $client->messages->stream(
  array( 
  'dateSentAfter' => '2015-05-01', 
  'dateSentBefore' => '2015-06-01'
  )
);

/* Browser magic */
$filename = $account_sid."_sms.csv"; 
header("Content-Type: application/csv");
header("Content-Disposition: attachment; filename={$filename}");

/* Write header */
$fields = array( 'SMS Message SID', 'From', 'To', 'Date Sent', 'Status', 'Direction', 'Price', 'Body' );
echo '"'.implode('","', $fields).'"'."\n";

/* Write rows */
foreach ($messages as $sms) { 
  $row = array(
    $sms->sid,
    $sms->from,
    $sms->to,
    $sms->dateSent->format('Y-m-d H:i:s'),
    $sms->status,
    $sms->direction,
    $sms->price,
    $sms->body
  );

  echo '"'.implode('","', $row).'"'."\n"; 
}
