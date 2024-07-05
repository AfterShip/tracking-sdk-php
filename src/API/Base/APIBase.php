<?php
/*
 * This code was auto generated by AfterShip SDK Generator.
 * Do not edit the class manually.
 */
namespace Tracking\API\Base;

use Tracking\Exception\ErrorCode;
use Psr\Http\Message\ResponseInterface;

class APIBase
{
    protected function parseSingleResource(ResponseInterface $resp, $resourceKey, $modelClass)
    {
        $body = $resp->getBody()->getContents();
        $statusCode = $resp->getStatusCode();
        $response = json_decode($body, true);

        if ($statusCode < 200 || $statusCode > 299) {
            throw ErrorCode::genRemoteError($statusCode, $response['meta']['code'] ?? null, $body, $response['meta']['message'] ?? null);
        }

        return $modelClass::fromArray($resourceKey ? $response['data'][$resourceKey] : $response['data'], $modelClass);
    }

    protected function parseMultipleResources(ResponseInterface $resp, $resourceKey, $modelClass, $paginationClass)
    {
        $body = $resp->getBody()->getContents();
        $statusCode = $resp->getStatusCode();

        $response = json_decode($body, true);

        if ($statusCode < 200 || $statusCode > 299) {
            throw ErrorCode::genRemoteError($statusCode, $response['meta']['code'] ?? null, $body, $response['meta']['message'] ?? null);
        }
        // 提取资源和分页信息
        $resources = [];

        $rawResources = $resourceKey ? $response['data'][$resourceKey] : $response['data'];
        if (isset($response['data'][$resourceKey])) {
            $resources = array_map(function ($resourceData) use ($modelClass) {
                return $modelClass::fromArray($resourceData, $modelClass);
            }, $rawResources);
        }

        $pagination = $paginationClass::fromArray($response['data'], $paginationClass);

        // 返回资源和分页信息
        return [
            'resources' => $resources,
            'pagination' => $pagination,
        ];
    }
}