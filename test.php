<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new \Tracking\Client([
    'apiKey' => 'asat_870416d3ea2742dba0eb68e23ddfcbe9',
    'authenticationType' => \Tracking\Config::AUTHENTICATION_TYPE_API_KEY,
]);

try {
    // $query = new \Tracking\API\Tracking\GetTrackingsQuery();
    // $query
    //     ->setLimit(1);
    // $trackingInfo = $client->tracking->getTrackings($query);
    // echo json_encode($trackingInfo);
    // $trackingInfo = $client->tracking->getTrackingById('cf03101d27004e7ea95a5a916d96216b');
    // echo json_encode($trackingInfo->checkpoints);

    // $payload = new \Tracking\API\Tracking\CreateTrackingRequest();
    // $payload->tracking_number = '9400136208070372945747';
    // $payload->slug = 'usps';
    // $trackingInfo = $client->tracking->createTracking($payload);
    // echo json_encode($trackingInfo);

    // $payload = new \Tracking\API\Tracking\CreateTrackingRequest();
    // $payload->tracking_number = '420927089200190379641400070444';
    // $payload->slug = 'usps';
    // $trackingInfo = $client->tracking->createTracking($payload);
    // echo json_encode($trackingInfo);
    // d6356ff8fe8b40e697159743ed4f5a71

    // $trackingInfo = $client->tracking->getTrackingById('c27f1f4c368044988a6d2f45ff5c04f9');
    // echo json_encode($trackingInfo);

    // $payload = new \Tracking\API\Tracking\UpdateTrackingByIdRequest();
    // $payload->title = 'test';
    // $trackingInfo = $client->tracking->updateTrackingById('c27f1f4c368044988a6d2f45ff5c04f9', $payload);
    // echo json_encode($trackingInfo);

    // $trackingInfo = $client->tracking->retrackTrackingById('d6356ff8fe8b40e697159743ed4f5a71');
    // echo json_encode($trackingInfo);

    // $payload = new \Tracking\API\Tracking\MarkTrackingCompletedByIdRequest();
    // $payload->reason = 'DELIVERED';
    // $trackingInfo = $client->tracking->markTrackingCompletedById('c27f1f4c368044988a6d2f45ff5c04f9', $payload);
    // echo json_encode($trackingInfo);

    // $couriers = $client->courier->getUserCouriers();
    // echo json_encode($couriers);

    // $couriers = $client->courier->getAllCouriers();
    // echo json_encode($couriers);

    // $payload = new \Tracking\API\EstimatedDeliveryDate\PredictBatchRequest();
    // $edd = new \Tracking\Model\EstimatedDeliveryDateRequest();
    // $edd->slug = 'ups';
    // $edd->pickup_time = '2024-08-01 06:42:30';
    // $orginAddress = new \Tracking\Model\OriginAddressEstimatedDeliveryDateRequest();
    // $orginAddress->country_region = 'USA';
    // $orginAddress->state = 'USA';
    // $edd->origin_address = $orginAddress;

    // $destAddress = new \Tracking\Model\DestinationAddressEstimatedDeliveryDateRequest();
    // $destAddress->country_region = 'USA';
    // $destAddress->state = 'USA';
    // $edd->destination_address = $destAddress;
    // $payload->estimated_delivery_dates = [$edd];
    // $notification = $client->estimated_delivery_date->predictBatch($payload);
    // echo json_encode($notification);

    $payload = new \Tracking\API\EstimatedDeliveryDate\PredictBatchRequest();
    $edd = new \Tracking\Model\EstimatedDeliveryDateRequest();
    $edd->slug = 'ups';
    $edd->pickup_time = '2024-08-01 06:42:30';
    $orginAddress = new \Tracking\Model\OriginAddressEstimatedDeliveryDateRequest();
    $orginAddress->country_region = 'USA';
    $orginAddress->state = 'USA';
    $edd->origin_address = $orginAddress;

    $destAddress = new \Tracking\Model\DestinationAddressEstimatedDeliveryDateRequest();
    $destAddress->country_region = 'USA';
    $destAddress->state = 'USA';
    $edd->destination_address = $destAddress;
    $payload->estimated_delivery_dates = [$edd];
    $notification = $client->estimated_delivery_date->predictBatch($payload);
    echo json_encode($notification);
} catch (\Tracking\Exception\AfterShipError $e) {
    // Handle the error
    var_dump($e->getErrorCode());
    var_dump($e->getStatusCode());
}
