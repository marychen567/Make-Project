<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;
use Twilio\TwiML;


// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'AC4c44a7dc188a204ccac7fc4b9afc3590';
$auth_token = '85237d917b5c889d20e11322755b71b4';
$client = new Client($account_sid, $auth_token);
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+18722053869";


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
        '+18588373614',
        array(
            'from' => $from,
            'body' => $body,
            'mediaUrl' => $media,
        )
    );
}







// $client = new Client($account_sid, $auth_token);
// $client->messages->create(
//     // Where to send a text message (your cell phone?)
//     '+18588373614',
//     array(
//         'from' => $twilio_number,
//         'body' => $firstmessage
//     )
// );

