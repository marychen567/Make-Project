<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'AC4c44a7dc188a204ccac7fc4b9afc3590';
$auth_token = '85237d917b5c889d20e11322755b71b4';
$client = new Client($account_sid, $auth_token);
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+18722053869";


$messages = $client->messages
                   ->read(array(
                              "dateSent" => new \DateTime('2019-5-1'),
                              "from" => "+13126180668",
                              "to" => "+18722053869"
                          ),
                          25
                   );
$help = array();

foreach ($messages as $record) {
    $help[]=$record->body;
}
// print($record);

// $record = array_map('strval', $record);

// // // echo implode( ", ", $record );
// // // echo count(array_keys($messages, 'Done!'));

$counts = array_count_values($help);
$default = "You've completed ".$counts["Done!"]." WSJ reading habits today! You've completed ".$counts["Yes ma'am!"]." gym habits today!";

$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+13126180668',
    array(
        'from' => $twilio_number,
        'body' => $default
    )
);

var_dump($help);

// $twilio->messages("SM78c16f1902748cafcfd3973239608abd","SM0ef237eab571131058bd06a83b86bbff","SM6c4996052358316a3dcf973997d537b2","SMc47fb353bd4a0c0f9cb19737b946cd58","SM5c2947f7ffe495e6aa398cf0459d2fd2","SMac65f543aa354707605c92e0d34f30fa","SM3af066c40cd562d6f1a7cff2a65d20a2","SM3595dcd25bac136f3238cab8e4a3aafa","SMfce246a5824bd9d8e580a1d071e6f149","SM167b377e7d8c80662d1786f2f8dd3782","SM53338959ef115fde5de1adeccbedb151","SM0f5b9acd575a2f3248e31e0a478c519c","SMe5beeed2386986ffd255ca7bde3785f2","SMde8e10eadd05efd5df43866d6f29b0ef","SMf069fe0137a3d172027ca1553a477ffb","SM769ba046aa457f09adf4bb59dedcbec7","SM1bf73a3c64293de5d3cda412fec4ac63","SM03bc334cfbfa03b74f5f0abc865d0961","SM146040fd0f3bd255ffe08a38be0fe984","SMa2b5d6ac19cfec586475260a1e493369","SMb4af9ffa5b4c0a69ac1480ee37412e68","SM86fcd45151b7e43f0393f37b1abedb04","SM8ff3e24f709d4ac7d3df7f9e44dd01c9","SMf9f56a2a1820441a5fe1ec2c05d8aa88","SM58a33f91b0bc0057df9521c47fbc5cee","SMbfcdc6814e1f90fda879bce7fc00ab2d","SM974dfb1dbf02d9cf2b9d675e923ef331","SMf384d2cc7021a5b4fd84eb75de26f48c","SMc79c4e23a9134d7e33318d044e6cf0a5","SMd092b80c31d5b413c44588d20c0f1611","SM6f07e291e2a8fa634f5f0519ff30f3e2","SMc87cdbe1f5a5ad71f67644bac7f7f849","SM90af0fcf81daed88dfb33f5241e02e39","SMf52c70e8cf3cd34c0b24963c9d714d89","SM787d4b5f71f4d9bcf4092389aa51d868","SM080de65bcec32992e431be9a4cd15e28","SMbbdfd5abb763ba7c97de1dbd137de3fe","SM7e81c0857e05d97896eede087aa3192a","SMcc564c373b4f03e5781beba40f52edcd","SM12cfe9fe4e334510d2b787568af9eb20","SM46fc8d28ac50504bca7f235a9c92211e","SM51c52988cfe920ca4b05098463b84efb","SM7c32f2a5f7472fab9d9e50d8347e870b","SMfd905a8bb8c163c0a990927e6a2ae710","SM0a9a1db75703ede358dc39405d23eb42","SMd63bd0438307f678cda012b4063f46f9","SM63c331d13fb50f931291a52571d54896","SM47a4037b8c0b1f607ae7c7539a946414","SMf03cd00af33c6a8f6940981101a1150d","SM8bec4223d3e7dc3eec41adaa0bad566
// 	")
//        ->delete();




// $message = $twilio->messages("SSM5e030ae76e593102dc985cc79e378610")
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