<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php

require_once 'vendor/autoload.php'; // Loads the library
use Twilio\Twiml;

$response = new Twiml;
$body = $_REQUEST['Body'];
// $response->message("The Robots are coming! Head for the hills!");
// print $response;
$default = "no";

$responseMessages = array(
    'hi'    => array('body' => 'Thats great- current events are important!', 
                         'media' => 'https://gph.is/1N9HA9S'),
    'workedout!'       => array('body' => 'One step closer to losing the dadbod!',
                         'media' => 'https://media.giphy.com/media/5vWRclJCmjzNLdzUPK/giphy.gif')
);


foreach ($responseMessages as $habit => $messages) {
    if ('hi' == $body) {
        $body = $messages['body'];
        $media = $messages['media'];
	$response->message->create(
        '+18588373614',
        array(
            'from' => $from,
            'body' => $body,
            'media' => $media,
        )
        );
}
}
 else {
	$response->message($default);
}
print $response;