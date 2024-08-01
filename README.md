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
    - [Usage](#usage)
  - [Constructor](#constructor)
    - [Example](#example)
  - [Rate Limiter](#rate-limiter)
  - [Error Handling](#error-handling)
    - [Error List](#error-list)
  - [Endpoints](#endpoints)
    - [/trackings](#trackings)
    - [/couriers](#couriers)
    - [/last\_checkpoint](#last_checkpoint)
    - [/notifications](#notifications)
    - [/estimated-delivery-date](#estimated-delivery-date)
  - [Help](#help)
  - [License](#license)


## Before you begin

Before you begin to integrate:

- [Create an AfterShip account](https://admin.aftership.com/).
- [Create an API key](https://organization.automizely.com/api-keys).
- [Install PHP](https://www.php.net/downloads.php) version 8.0 or later.

### API and SDK Version

Each SDK version is designed to work with a specific API version. Please refer to the table below to identify the supported API versions for each SDK version, ensuring you select the appropriate SDK version for the API version you intend to use.

| SDK Version | Supported API Version | Branch                                                     |
| ----------- | --------------------- | ---------------------------------------------------------- |
| 7.x.x       | 2024-04               | https://github.com/AfterShip/tracking-sdk-php/tree/2024-04 |
| 6.x.x       | 2023-10               | https://github.com/AfterShip/aftership-sdk-php             |
| <=5.x.x     | Legacy API            | https://github.com/AfterShip/aftership-sdk-php             |


## Quick Start

### Installation
```bash
composer require aftership/tracking-sdk
```

### Usage
```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new \Tracking\Client([
    'apiKey' => 'YOUR_API_KEY',
    'authenticationType' => \Tracking\Config::AUTHENTICATION_TYPE_API_KEY,
]);

try {
    $trackingInfo = $client->tracking->getTrackingById('<tracking-id>');
    var_dump($trackingInfo->checkpoints);
} catch (\Tracking\Exception\AfterShipError $e) {
    // Handle the error
    var_dump($e->getErrorCode());
    var_dump($e->getStatusCode());
}
```


## Constructor

Create AfterShip instance with options

| Name       | Type   | Required | Description                                                                                                                       |
|------------|--------|----------|-----------------------------------------------------------------------------------------------------------------------------------|
| api_key    | string | ✔        | Your AfterShip API key                                                                                                            |
| auth_type  | enum   |          | Default value: `AuthType.API_KEY` <br > AES authentication: `AuthType.AES` <br > RSA authentication: `AuthType.RSA`               |
| api_secret | string |          | Required if the authentication type is `AuthType.AES` or `AuthType.RSA`                                                           |
| domain     | string |          | AfterShip API domain. Default value: https://api.aftership.com                                                                    |
| user_agent | string |          | User-defined user-agent string, please follow [RFC9110](https://www.rfc-editor.org/rfc/rfc9110#field.user-agent) format standard. |
| proxy      | string |          | HTTP proxy URL to use for requests. <br > Default value: `null` <br > Example: `http://192.168.0.100:8888`                        |
| max_retry  | number |          | Number of retries for each request. Default value: 2. Min is 0, Max is 10.                                                        |
| timeout    | number |          | Timeout for each request in milliseconds.                                                                                         |

### Example

```php
$client = new \Tracking\Client([
    'apiKey' => 'YOUR_API_KEY',
    'apiSecret' => 'YOUR_API_SECRET',
    'authenticationType' => \Tracking\Config::AUTHENTICATION_TYPE_AES,
]);
```

## Rate Limiter

See the [Rate Limit](https://www.aftership.com/docs/aftership/quickstart/rate-limit) to understand the AfterShip rate limit policy.

## Error Handling

The SDK will return an error object when there is any error during the request, with the following specification:

| Name          | Type   | Description                    |
|---------------|--------|--------------------------------|
| message       | string | Detail message of the error    |
| code          | enum   | Error code enum for API Error. |
| meta_code     | number | API response meta code.        |
| status_code   | number | HTTP status code.              |
| response_body | string | API response body.             |


### Error List

| code                              | meta_code        | status_code     | message                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                | 
|-----------------------------------|------------------|-----------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| INVALID_REQUEST                   | 	400             | 	400	           | The request was invalid or cannot be otherwise served.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |
| INVALID_JSON                      | 	4001            | 	400	           | Invalid JSON data.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     |
| TRACKING_ALREADY_EXIST            | 	4003            | 	400	           | Tracking already exists.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               |
| TRACKING_DOES_NOT_EXIST           | 	4004            | 	404	           | Tracking does not exist.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               |                             
| TRACKING_NUMBER_INVALID           | 	4005            | 	400	           | The value of tracking_number is invalid.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               |
| TRACKING_REQUIRED                 | 	4006            | 	400	           | tracking object is required.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           |
| TRACKING_NUMBER_REQUIRED          | 	4007            | 	400	           | tracking_number is required.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           |
| VALUE_INVALID                     | 	4008            | 	400	           | The value of [field_name] is invalid.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  |
| VALUE_REQUIRED                    | 	4009            | 	400	           | [field_name] is required.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              |
| SLUG_INVALID                      | 	4010            | 	400	           | The value of slug is invalid.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          |
| MISSING_OR_INVALID_REQUIRED_FIELD | 	4011            | 	400	           | Missing or invalid value of the required fields for this courier. Besides tracking_number, also required: [field_name]                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |
| BAD_COURIER                       | 	4012            | 	400	           | The error message will be one of the following:<br/>1. Unable to import shipment as the carrier is not on your approved list for carrier auto-detection. Add the carrier here: https://admin.aftership.com/settings/couriers<br/>2. Unable to import shipment as we don’t recognize the carrier from this tracking number.<br/>3. Unable to import shipment as the tracking number has an invalid format.<br/>4. Unable to import shipment as this carrier is no longer supported.<br/>5. Unable to import shipment as the tracking number does not belong to a carrier in that group. |
| INACTIVE_RETRACK_NOT_ALLOWED      | 	4013            | 	400	           | Retrack is not allowed. You can only retrack an inactive tracking.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     |
| NOTIFICATION_REUQIRED             | 	4014            | 	400	           | notification object is required.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       |
| ID_INVALID                        | 	4015            | 	400	           | The value of id is invalid.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            |
| RETRACK_ONCE_ALLOWED              | 	4016            | 	400	           | Retrack is not allowed. You can only retrack each shipment once.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       |
| TRACKING_NUMBER_FORMAT_INVALID    | 	4017            | 	400	           | The format of tracking_number is invalid.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              |
| API_KEY_INVALID                   | 	401             | 	401	           | The API key is invalid.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                |
| REQUEST_NOT_ALLOWED               | 	403             | 	403            | The request is understood, but it has been refused or access is not allowed.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           |
| NOT_FOUND                         | 	404             | 	404	           | The URI requested is invalid or the resource requested does not exist.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |
| TOO_MANY_REQUEST                  | 	429             | 	429            | You have exceeded the API call rate limit. The default limit is 10 requests per second.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                |
| INTERNAL_ERROR	                   | 500 502 503 504	 | 500 502 503 504 | Something went wrong on AfterShip's end.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               |

## Endpoints

The AfterShip instance has the following properties which are exactly the same as the API endpoints:

- courier - Get a list of our supported couriers.
- tracking - Create trackings, update trackings, and get tracking results.
- last_checkpoint - Get tracking information of the last checkpoint of a tracking.
- notification - Get, add or remove contacts (sms or email) to be notified when the status of a tracking has changed.


### /trackings

**POST** /trackings

```php
$payload = new \Tracking\API\Tracking\TrackingCreateTrackingRequest();
$payload->tracking_number = '<tracking_number>';
$payload->slug = '<slug>';
$trackingInfo = $client->tracking->createTracking($payload);
var_dump($trackingInfo);
```

**DELETE** /trackings/:id

```php
$trackingInfo = $client->tracking->deleteTrackingById('<tracking-id>');
var_dump($trackingInfo);
```

**GET** /trackings

```php
$query = new \Tracking\API\Tracking\GetTrackingsQuery();
$query->setPage(1)
    ->setLimit(10)
    ->setKeyword('123');
$trackingInfo = $client->tracking->getTrackings($query);
var_dump($trackingInfo);
```

**GET** /trackings/:id

```php
$trackingInfo = $client->tracking->getTrackingById('<tracking-id>');
var_dump($trackingInfo);
```

**PUT** /trackings/:id

```php
$payload = new \Tracking\API\Tracking\TrackingUpdateTrackingByIdRequest();
$payload->title = 'test';
$trackingInfo = $client->tracking->updateTrackingById('<tracking-id>', $payload);
var_dump($trackingInfo);
```

**POST** /trackings/:id/retrack

```php
$trackingInfo = $client->tracking->retrackTrackingById('<tracking-id>');
var_dump($trackingInfo);
```

**POST** /trackings/:id/mark-as-completed

```php
$payload = new \Tracking\API\Tracking\MarkTrackingCompletedByIdRequest();
$payload->reason = 'DELIVERED';
$trackingInfo = $client->tracking->markTrackingCompletedById('<tracking-id>', $payload);
var_dump($trackingInfo);
```

### /couriers
**GET** /couriers

```php
$couriers = $client->courier->getUserCouriers();
var_dump($couriers);
```

**GET** /couriers/all

```php
$couriers = $client->courier->getAllCouriers();
var_dump($couriers);
```

**POST** /couriers/detect

```php
$payload = new \Tracking\API\Courier\TrackingDetectCourierRequest();
$payload->slug = '<slug>';
$payload->tracking_number = '<tracking_number>';
$couriers = $client->courier->detectCourier($payload);
var_dump($couriers);
```

### /last_checkpoint

**GET** /last_checkpoint/:id

```php
$checkpoint = $client->last_checkpoint->getCheckpointByTrackingId('<tracking-id>');
var_dump($checkpoint);
```

### /notifications

**GET** /notifications/:id

```php
$notification = $client->notification->getNotificationByTrackingId('<tracking-id>');
var_dump($notification);
```

**POST** /notifications/:id/add

```php
$payload = new \Tracking\Model\NotificationRequestV1();
$payload->emails = ['YOUR_EMAIL'];
$notification = $client->notification->addNotificationByTrackingId('<tracking-id>', $payload);
var_dump($notification);
```

**POST** /notifications/:id/remove

```php
$payload = new \Tracking\Model\NotificationRequestV1();
$payload->emails = ['YOUR_EMAIL'];
$notification = $client->notification->deleteNotificationByTrackingId('<tracking-id>', $payload);
var_dump($notification);
```

### /estimated-delivery-date

**POST** /estimated-delivery-date/predict-batch

```php
$payload = new \Tracking\API\EstimatedDeliveryDate\PredictBatchRequest();
$edd = new \Tracking\Model\EstimatedDeliveryDateRequest();
$edd->slug = '<slug>';
$payload->estimated_delivery_dates = [$edd];
$notification = $client->estimated_delivery_date->predictBatch($payload);
var_dump($notification);
```

## Help

If you get stuck, we're here to help:

- [Issue Tracker](https://github.com/AfterShip/tracking-sdk-php/issues) for questions, feature requests, bug reports and general discussion related to this package. Try searching before you create a new issue.
- Contact AfterShip official support via support@aftership.com

## License
Copyright (c) 2024 AfterShip

Licensed under the MIT license.
