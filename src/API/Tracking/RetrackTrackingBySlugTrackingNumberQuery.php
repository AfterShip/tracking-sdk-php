<?php
/*
 * This code was auto generated by AfterShip SDK Generator.
 * Do not edit the class manually.
 */
namespace Tracking\API\Tracking;

class RetrackTrackingBySlugTrackingNumberQuery extends \Tracking\API\Base\QueryBase
{
    /**
     * @var string|null Additional field required by some carriers to retrieve the tracking info. The shipper’s carrier account number. Refer to our article on  for more details.
     */
    public $tracking_account_number;
    /**
     * @var string|null Additional field required by some carriers to retrieve the tracking info. The origin country/region of the shipment. Refer to our article on  for more details.
     */
    public $tracking_origin_country;
    /**
     * @var string|null Additional field required by some carriers to retrieve the tracking info. The destination country/region of the shipment. Refer to our article on  for more details.
     */
    public $tracking_destination_country;
    /**
     * @var string|null Additional field required by some carriers to retrieve the tracking info. A type of tracking credential required by some carriers. Refer to our article on  for more details.
     */
    public $tracking_key;
    /**
     * @var string|null Additional field required by some carriers to retrieve the tracking info. The postal code of the recipient’s address. Refer to our article on  for more details.
     */
    public $tracking_postal_code;
    /**
     * @var string|null Additional field required by some carriers to retrieve the tracking info. The date the shipment was sent, using the format YYYYMMDD. Refer to our article on  for more details.
     */
    public $tracking_ship_date;
    /**
     * @var string|null Additional field required by some carriers to retrieve the tracking info. The state/province of the recipient’s address. Refer to our article on  for more details.
     */
    public $tracking_state;

    public function setTrackingAccountNumber(string $tracking_account_number): RetrackTrackingBySlugTrackingNumberQuery
    {
        $this->tracking_account_number = $tracking_account_number;
        return $this;
    }
    public function setTrackingOriginCountry(string $tracking_origin_country): RetrackTrackingBySlugTrackingNumberQuery
    {
        $this->tracking_origin_country = $tracking_origin_country;
        return $this;
    }
    public function setTrackingDestinationCountry(string $tracking_destination_country): RetrackTrackingBySlugTrackingNumberQuery
    {
        $this->tracking_destination_country = $tracking_destination_country;
        return $this;
    }
    public function setTrackingKey(string $tracking_key): RetrackTrackingBySlugTrackingNumberQuery
    {
        $this->tracking_key = $tracking_key;
        return $this;
    }
    public function setTrackingPostalCode(string $tracking_postal_code): RetrackTrackingBySlugTrackingNumberQuery
    {
        $this->tracking_postal_code = $tracking_postal_code;
        return $this;
    }
    public function setTrackingShipDate(string $tracking_ship_date): RetrackTrackingBySlugTrackingNumberQuery
    {
        $this->tracking_ship_date = $tracking_ship_date;
        return $this;
    }
    public function setTrackingState(string $tracking_state): RetrackTrackingBySlugTrackingNumberQuery
    {
        $this->tracking_state = $tracking_state;
        return $this;
    }
}
