<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once '/path/to/vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = getenv("AC4fa536fefb911f9d5e0b5ed0821e493d");
$token = getenv("652092e2c1db09fae9696ef5e381e1d6");
$twilio = new Client($sid, $token);

$notification = $twilio->verify->v2->services("VAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                   ->entities("identity")
                                   ->challenges("YCXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                   ->notifications
                                   ->create();

print($notification->sid);