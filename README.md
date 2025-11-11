# AfterShip Tracking API library for PHP

This library allows you to quickly and easily use the AfterShip Tracking API via PHP.

For updates to this library, see our [GitHub release page](https://github.com/AfterShip/tracking-sdk-php/releases).

If you need support using AfterShip products, please contact support@aftership.com.

## Table of Contents

- [AfterShip Tracking API library for PHP](#aftership-tracking-api-library-for-php)
  - [Table of Contents](#table-of-contents)
  - [Before you begin](#before-you-begin)
    - [API and SDK Version](#api-and-sdk-version)
  - [Quick Start](#quick-start)
    - [Installation](#installation)
  - [Constructor](#constructor)
    - [Example](#example)
  - [Rate Limiter](#rate-limiter)
  - [Error Handling](#error-handling)
    - [Error List](#error-list)
  - [Endpoints](#endpoints)
    - [/couriers](#couriers)
    - [/courier-connections](#courier-connections)
    - [/estimated-delivery-date](#estimated-delivery-date)
    - [/trackings](#trackings)
  - [Help](#help)
  - [License](#license)


## Before you begin

Before you begin to integrate:

- [Create an AfterShip account](https://admin.aftership.com/).
- [Create an API key](https://organization.automizely.com/api-keys).
- [Install PHP](https://www.php.net/downloads.php) version 8.1 or later.

### API and SDK Version

- SDK Version: 14.0.0
- API Version: 2025-07
## Quick Start

### Installation
```bash
composer require aftership/tracking-sdk
```


## Constructor

Create AfterShip instance with options

| Name       | Type   | Required | Description                                                                                                                       |
| ---------- | ------ | -------- | --------------------------------------------------------------------------------------------------------------------------------- |
| api_key    | string | ✔        | Your AfterShip API key                                                                                                            |
| auth_type  | enum   |          | Default value: `AuthType.API_KEY` <br> AES authentication: `AuthType.AES` <br> RSA authentication: `AuthType.RSA`               |
| api_secret | string |          | Required if the authentication type is `AuthType.AES` or `AuthType.RSA`                                                           |
| domain     | string |          | AfterShip API domain. Default value: https://api.aftership.com                                                                    |
| user_agent | string |          | User-defined user-agent string, please follow [RFC9110](https://www.rfc-editor.org/rfc/rfc9110#field.user-agent) format standard. |
| proxy      | string |          | HTTP proxy URL to use for requests. <br> Default value: `null` <br> Example: `http://192.168.0.100:8888`                        |
| max_retry  | number |          | Number of retries for each request. Default value: 2. Min is 0, Max is 10.                                                        |
| timeout    | number |          | Timeout for each request in milliseconds.                                                                                         |

### Example

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new \Tracking\Client([
    'apiKey' => 'YOUR_API_KEY',
    'authenticationType' => \Tracking\Config::AUTHENTICATION_TYPE_API_KEY,
]);

try {

    $query = new \Tracking\Model\GetTrackingByIdQuery();
    $response = $client->tracking->getTrackingById(
        'valid_value', 
        
        $query
    );
    var_dump($response);
} catch (\Tracking\Exception\AfterShipError $e) {
    // Handle the error
    var_dump($e->getErrorCode());
    var_dump($e->getStatusCode());
}
```

## Rate Limiter

See the [Rate Limit](https://www.aftership.com/docs/tracking/quickstart/rate-limit) to understand the AfterShip rate limit policy.

## Error Handling

The SDK will return an error object when there is any error during the request, with the following specification:

| Name            | Type   | Description                    |
| --------------- | ------ | ------------------------------ |
| message         | string | Detail message of the error    |
| code            | enum   | Error code enum for API Error. |
| meta_code       | number | API response meta code.        |
| status_code     | number | HTTP status code.              |
| response_body   | string | API response body.             |
| response_header | object | API response header.           |


### Error List

| code                              | meta_code       | status_code     | message |
| --------------------------------- | --------------- | --------------- | ------- |
| INVALID_REQUEST | 400 | 400 | The request was invalid or cannot be otherwise served. |
| INVALID_JSON | 4001 | 400 | Invalid JSON data. |
| TRACKING_ALREADY_EXIST | 4003 | 400 | Tracking already exists. |
| TRACKING_DOES_NOT_EXIST | 4004 | 404 | Tracking does not exist. |
| TRACKING_NUMBER_INVALID | 4005 | 400 | The value of tracking_number is invalid. |
| TRACKING_REQUIRED | 4006 | 400 | tracking object is required. |
| TRACKING_NUMBER_REQUIRED | 4007 | 400 | tracking_number is required. |
| VALUE_INVALID | 4008 | 400 | The value of [field_name] is invalid. |
| VALUE_REQUIRED | 4009 | 400 | [field_name] is required. |
| SLUG_INVALID | 4010 | 400 | The value of slug is invalid. |
| MISSING_OR_INVALID_REQUIRED_FIELD | 4011 | 400 | Missing or invalid value of the required fields for this courier. Besides tracking_number, also required: [field_name] |
| BAD_COURIER | 4012 | 400 | The error message will be one of the following:1. Unable to import shipment as the carrier is not on your approved list for carrier auto-detection. Add the carrier here: https://admin.aftership.com/settings/couriers2. Unable to import shipment as we don&#39;t recognize the carrier from this tracking number.3. Unable to import shipment as the tracking number has an invalid format.4. Unable to import shipment as this carrier is no longer supported.5. Unable to import shipment as the tracking number does not belong to a carrier in that group. |
| INACTIVE_RETRACK_NOT_ALLOWED | 4013 | 400 | Retrack is not allowed. You can only retrack an inactive tracking. |
| NOTIFICATION_REQUIRED | 4014 | 400 | notification object is required. |
| ID_INVALID | 4015 | 400 | The value of id is invalid. |
| RETRACK_ONCE_ALLOWED | 4016 | 400 | Retrack is not allowed. You can only retrack each shipment once. |
| TRACKING_NUMBER_FORMAT_INVALID | 4017 | 400 | The format of tracking_number is invalid. |
| API_KEY_INVALID | 401 | 401 | The API Key is invalid. |
| REQUEST_NOT_ALLOWED | 403 | 403 | The request is understood, but it has been refused or access is not allowed. |
| NOT_FOUND | 404 | 404 | The URI requested is invalid or the resource requested does not exist. |
| TOO_MANY_REQUEST | 429 | 429 | You have exceeded the API call rate limit. The default limit is 10 requests per second. |
| INTERNAL_ERROR | 500 | 500 | Something went wrong on AfterShip&#39;s end. |
| INTERNAL_ERROR | 502 | 502 | Something went wrong on AfterShip&#39;s end. |
| INTERNAL_ERROR | 503 | 503 | Something went wrong on AfterShip&#39;s end. |
| INTERNAL_ERROR | 504 | 504 | Something went wrong on AfterShip&#39;s end. |

## Endpoints

The AfterShip instance has the following properties which are exactly the same as the API endpoints:

- courier
  - Get couriers
  - Detect courier
- courier_connection
  - Get courier connections
  - Create courier connections
  - Get courier connection by id
  - Update courier connection by id
  - Delete courier connection by id
- estimated_delivery_date
  - Prediction for the Estimated Delivery Date
  - Batch prediction for the Estimated Delivery Date
- tracking
  - Get trackings
  - Create a tracking
  - Get a tracking by ID
  - Update a tracking by ID
  - Delete a tracking by ID
  - Retrack an expired tracking by ID
  - Mark tracking as completed by ID

### /couriers
**GET** /couriers

```php

$query = new \Tracking\Model\GetCouriersQuery();
$response = $client->courier->getCouriers(
    
    
    $query
);
var_dump($response);
```

**POST** /couriers/detect

```php
$payload = new \Tracking\Model\DetectCourierRequest();
$payload->tracking_number = 'valid_value';

$response = $client->courier->detectCourier(
    
    $payload
    
);
var_dump($response);
```

### /courier-connections
**GET** /courier-connections

```php

$query = new \Tracking\Model\GetCourierConnectionsQuery();
$response = $client->courier_connection->getCourierConnections(
    
    
    $query
);
var_dump($response);
```

**POST** /courier-connections

```php
$payload = new \Tracking\Model\PostCourierConnectionsRequest();
$payload->courier_slug = 'valid_value';
$payload->credentials = [];

$response = $client->courier_connection->postCourierConnections(
    
    $payload
    
);
var_dump($response);
```

**GET** /courier-connections/{id}

```php

$response = $client->courier_connection->getCourierConnectionsById(
    'valid_value'
    
    
);
var_dump($response);
```

**PATCH** /courier-connections/{id}

```php
$payload = new \Tracking\Model\PutCourierConnectionsByIdRequest();
$payload->credentials = [];

$response = $client->courier_connection->putCourierConnectionsById(
    'valid_value', 
    $payload
    
);
var_dump($response);
```

**DELETE** /courier-connections/{id}

```php

$response = $client->courier_connection->deleteCourierConnectionsById(
    'valid_value'
    
    
);
var_dump($response);
```

### /estimated-delivery-date
**POST** /estimated-delivery-date/predict

```php
$payload = new \Tracking\Model\EstimatedDeliveryDateRequest();
$payload->slug = 'valid_value';
$originAddress = new \Tracking\Model\EstimatedDeliveryDateRequestOriginAddress();
$payload->origin_address = $originAddress;
$destinationAddress = new \Tracking\Model\EstimatedDeliveryDateRequestDestinationAddress();
$payload->destination_address = $destinationAddress;

$response = $client->estimated_delivery_date->predict(
    
    $payload
    
);
var_dump($response);
```

**POST** /estimated-delivery-date/predict-batch

```php
$payload = new \Tracking\Model\PredictBatchRequest();

$response = $client->estimated_delivery_date->predictBatch(
    
    $payload
    
);
var_dump($response);
```

### /trackings
**GET** /trackings

```php

$query = new \Tracking\Model\GetTrackingsQuery();
$response = $client->tracking->getTrackings(
    
    
    $query
);
var_dump($response);
```

**POST** /trackings

```php
$payload = new \Tracking\Model\CreateTrackingRequest();
$payload->tracking_number = 'valid_value';

$response = $client->tracking->createTracking(
    
    $payload
    
);
var_dump($response);
```

**GET** /trackings/{id}

```php

$query = new \Tracking\Model\GetTrackingByIdQuery();
$response = $client->tracking->getTrackingById(
    'valid_value', 
    
    $query
);
var_dump($response);
```

**PUT** /trackings/{id}

```php
$payload = new \Tracking\Model\UpdateTrackingByIdRequest();

$response = $client->tracking->updateTrackingById(
    'valid_value', 
    $payload
    
);
var_dump($response);
```

**DELETE** /trackings/{id}

```php

$response = $client->tracking->deleteTrackingById(
    'valid_value'
    
    
);
var_dump($response);
```

**POST** /trackings/{id}/retrack

```php

$response = $client->tracking->retrackTrackingById(
    'valid_value'
    
    
);
var_dump($response);
```

**POST** /trackings/{id}/mark-as-completed

```php
$payload = new \Tracking\Model\MarkTrackingCompletedByIdRequest();

$response = $client->tracking->markTrackingCompletedById(
    'valid_value', 
    $payload
    
);
var_dump($response);
```


## Help

If you get stuck, we're here to help:

- [Issue Tracker](https://github.com/AfterShip/tracking-sdk-php/issues) for questions, feature requests, bug reports and general discussion related to this package. Try searching before you create a new issue.
- Contact AfterShip official support via support@aftership.com

## License
Copyright (c) 2025 AfterShip

Licensed under the MIT license.