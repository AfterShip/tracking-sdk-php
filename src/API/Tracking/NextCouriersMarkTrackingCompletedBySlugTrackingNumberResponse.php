<?php
/*
 * This code was auto generated by AfterShip SDK Generator.
 * Do not edit the class manually.
 */
namespace Tracking\API\Tracking;

use Tracking\Model\Base\Base;

class NextCouriersMarkTrackingCompletedBySlugTrackingNumberResponse extends Base
{
    /**
     * @var string Unique code of courier. Get courier
     */
    public $slug;
    /**
     * @var string Tracking number.
     */
    public $tracking_number;
    /**
     * @var string|null|string Source of next couriers.
     */
    public $source;
}
