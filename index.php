<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new \Tracking\Client([
    'apiKey' => 'asat_a56748fb062240cdba714d5767d63f35',
    'authenticationType' => \Tracking\Config::AUTHENTICATION_TYPE_API_KEY,
]);

try {
    $trackingId = 'ihdd4h4r9pdc8lxk7zi72010';
    $trackingInfo = $client->tracking->getTrackingById($trackingId);
    var_dump($trackingInfo->checkpoints);
} catch (\Tracking\Exception\AfterShipError $e) {
    // Handle the error
    var_dump($e->getErrorCode());
    var_dump($e->getStatusCode());
}