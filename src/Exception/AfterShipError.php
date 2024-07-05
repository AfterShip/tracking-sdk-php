<?php
/*
 * This code was auto generated by AfterShip SDK Generator.
 * Do not edit the class manually.
 */
namespace Tracking\Exception;

class AfterShipError extends \Exception
{
    protected $errorCode;
    protected $metaCode;
    protected $statusCode;
    protected $message;
    protected $responseBody;

    public function __construct($message, $errorCode, $statusCode, $metaCode = null, $responseBody = null)
    {
        parent::__construct($message, $statusCode);
        $this->metaCode = $metaCode;
        $this->message = $message;
        $this->errorCode = $errorCode;
        $this->statusCode = $statusCode;
        $this->responseBody = $responseBody;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function getMetaCode()
    {
        return $this->metaCode;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getResponseBody()
    {
        return $this->responseBody;
    }
}
