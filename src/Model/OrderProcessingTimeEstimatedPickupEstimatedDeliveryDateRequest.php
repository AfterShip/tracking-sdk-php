<?php
/*
 * This code was auto generated by AfterShip SDK Generator.
 * Do not edit the class manually.
 */
namespace Tracking\Model;

use Tracking\Model\Base\Base;

class OrderProcessingTimeEstimatedPickupEstimatedDeliveryDateRequest extends Base
{
    /**
     * @var string Processing time of an order, from being placed to being picked up. Only support day as value now.AfterShip will set day as the default value.
     */
    public $unit;
    /**
     * @var int|float Processing time of an order, from being placed to being picked up.AfterShip will set 0 as the default value.
     */
    public $value;
}
