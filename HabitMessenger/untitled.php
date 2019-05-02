<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php

require_once 'vendor/autoload.php'; // Loads the library
use Twilio\Twiml;

$response = new Twiml;
// $body = $_REQUEST['Body'];
// // $response->message("The Robots are coming! Head for the hills!");
// // print $response;
// $default = "Yes";



$responseMessages = array(
    'wsjdone!'    => array('body' => 'Thats great- current events are important!', 
                         'media' => 'https://gph.is/1N9HA9S'),
    'workedout!'       => array('body' => 'One step closer to losing the dadbod!',
                         'media' => 'https://media.giphy.com/media/5vWRclJCmjzNLdzUPK/giphy.gif')
);
/* 
** Default response message when receiving a message without key words.
*/
$firstmessage = "Goodmorning! First habit of the day is skimming WSJ!"


/*
** Read the contents of the incoming message fields.
*/ 

$body = $_REQUEST['Body']; 
$to = $_REQUEST['From'];
$from = $_REQUEST['To'];

/*
** Remove formatting from $body until it is just lowercase   
** characters without punctuation or spaces.
*/
$check = preg_replace("/[^A-Za-z0-9]/u", " ", $body); 
$check = trim($check); 
$check = strtolower($check); 
$sendDefault = true; // Default message is sent unless key word is found in following loop.


foreach ($responseMessages as $habit => $messages) {
    if ($habit == $check) {
        $body = $messages['body'];
        $media = $messages['media'];
        $sendDefault = false;
    }
}



if ($sendDefault != false) {
    $client->messages->create(
        '+18588373614',
        array(
            'from' => $twilio_number,
            'body' => $firstMessage,
        )
    );
} else {
    $client->messages->create(
        $to,
        array(
            'from' => $from,
            'body' => $body,
            'mediaUrl' => $media,
        )
    );
}






// if (strtolower($body) == 'nope') {
// 	$response->message("FINALLYYYY!");
// } else {
// 	$response->message($default);
// }
// print $response;