<?php
/*
 * This code was auto generated by AfterShip SDK Generator.
 * Do not edit the class manually.
 */
namespace Tracking\Model;

use Tracking\Model\Base\Base;

class Tracking extends Base
{
    /**
     * @var string Tracking ID.
     */
    public $id;
    /**
     * @var string The date and time the shipment was imported or added to AfterShip. It uses the format `YYYY-MM-DDTHH:mm:ssZ` for the timezone GMT +0.
     */
    public $created_at;
    /**
     * @var string The date and time the shipment was updated. It uses the format `YYYY-MM-DDTHH:mm:ssZ` for the timezone GMT +0.
     */
    public $updated_at;
    /**
     * @var string (Legacy) The date and time the shipment was updated. It uses the format `YYYY-MM-DDTHH:mm:ssZ` for the timezone GMT +0.
     */
    public $last_updated_at;
    /**
     * @var string Tracking number.
     */
    public $tracking_number;
    /**
     * @var string Unique courier code. When importing a shipment with no courier slug and the tracking number can’t be recognized, the courier will be marked as `unrecognized`. Get courier codes .
     */
    public $slug;
    /**
     * @var bool Whether or not AfterShip will continue tracking the shipments. Value is `false` when tag (status) is `Delivered`, `Expired`, or further updates for 30 days since last update.
     */
    public $active;
    /**
     * @var array|null Custom fields that accept an object with string field. In order to protect the privacy of your customers, do not include any  in custom fields.
     */
    public $custom_fields;
    /**
     * @var string|null Customer name of the tracking.
     */
    public $customer_name;
    /**
     * @var int|null Total transit time in days.- For delivered shipments: Transit time (in days) = Delivered date - Pick-up date- For undelivered shipments: Transit time (in days) = Current date - Pick-up dateValue as `null` for the shipment without pick-up date.
     */
    public $transit_time;
    /**
     * @var string|null The  for the origin country/region. E.g. USA for the United States.
     */
    public $origin_country_iso3;
    /**
     * @var string|null The state of the sender’s address.
     */
    public $origin_state;
    /**
     * @var string|null The city of the sender’s address.
     */
    public $origin_city;
    /**
     * @var string|null The postal code of the sender’s address.
     */
    public $origin_postal_code;
    /**
     * @var string|null The sender address that the shipment is shipping from.
     */
    public $origin_raw_location;
    /**
     * @var string|null The  for the destination country/region. E.g. USA for the United States.
     */
    public $destination_country_iso3;
    /**
     * @var string|null The state of the recipient’s address.
     */
    public $destination_state;
    /**
     * @var string|null The city of the recipient’s address.
     */
    public $destination_city;
    /**
     * @var string|null The postal code of the recipient’s address.
     */
    public $destination_postal_code;
    /**
     * @var string|null The shipping address that the shipment is shipping to.
     */
    public $destination_raw_location;
    /**
     * @var string|null Destination country/region of the tracking detected from the courier. ISO Alpha-3 (three letters). Value will be `null` if the courier doesn't provide the destination country.
     */
    public $courier_destination_country_iso3;
    /**
     * @var array[] Email address(es) to receive email notifications.
     */
    public $emails;
    /**
     * @var string|null The estimated delivery date provided by the carrier. It uses the shipment recipient’s timezone and the format may differ depending on how the carrier provides it:- YYYY-MM-DD- YYYY-MM-DDTHH:mm:ss- YYYY-MM-DDTHH:mm:ssZ
     */
    public $expected_delivery;
    /**
     * @var string|null Text field for the note.
     */
    public $note;
    /**
     * @var string|null A globally-unique identifier for the order.
     */
    public $order_id;
    /**
     * @var string|null The URL for the order in your system or store.
     */
    public $order_id_path;
    /**
     * @var string|null The date and time the order was created in your system or store. It uses the format: `YYYY-MM-DDTHH:mm:ssZ` based on whichever timezone you provide.
     */
    public $order_date;
    /**
     * @var int|float|null Number of packages under the tracking.
     */
    public $shipment_package_count;
    /**
     * @var string|null The date and time the shipment was picked up by the carrier. It uses the timezone where the pickup occured. The format may differ depending on how the carrier provides it:- YYYY-MM-DD- YYYY-MM-DDTHH:mm:ss- YYYY-MM-DDTHH:mm:ssZ
     */
    public $shipment_pickup_date;
    /**
     * @var string|null The date and time the shipment was delivered. It uses the shipment recipient’s timezone. The format may differ depending on how the carrier provides it:- YYYY-MM-DD- YYYY-MM-DDTHH:mm:ss- YYYY-MM-DDTHH:mm:ssZ
     */
    public $shipment_delivery_date;
    /**
     * @var string|null The carrier service type for the shipment.
     */
    public $shipment_type;
    /**
     * @var int|float|null Shipment weight provied by carrier.
     */
    public $shipment_weight;
    /**
     * @var string|null Weight unit provied by carrier.
     */
    public $shipment_weight_unit;
    /**
     * @var string|null Signed by information for delivered shipment.
     */
    public $signed_by;
    /**
     * @var array[] The phone number(s) to receive sms notifications.  Phone number should begin with `+` and `Area Code` before phone number. Comma separated for multiple values.
     */
    public $smses;
    /**
     * @var string Source of how this tracking is added.
     */
    public $source;
    /**
     * @var string|null|\Tracking\Model\TagV1 Current status of tracking. (
     */
    public $tag;
    /**
     * @var string Current subtag of tracking. (
     */
    public $subtag;
    /**
     * @var string Normalized tracking message. (
     */
    public $subtag_message;
    /**
     * @var string By default this field shows the `tracking_number`, but you can customize it as you wish with any info (e.g. the order number).
     */
    public $title;
    /**
     * @var int|float Number of attempts AfterShip tracks at courier's system.
     */
    public $tracked_count;
    /**
     * @var bool|null Indicates if the shipment is trackable till the final destination.Three possible values:- true- false- null
     */
    public $last_mile_tracking_supported;
    /**
     * @var string|null The recipient’s language. If you set up AfterShip notifications in different languages, we use this to send the recipient tracking updates in their preferred language.
     */
    public $language;
    /**
     * @var string Deprecated
     */
    public $unique_token;
    /**
     * @var \Tracking\Model\Checkpoint[] Array of checkpoint object describes the checkpoint information.
     */
    public $checkpoints;
    /**
     * @var array[] Phone number(s) subscribed to receive sms notifications. Comma separated for multiple values
     */
    public $subscribed_smses;
    /**
     * @var array[] Email address(es) subscribed to receive email notifications. Comma separated for multiple values
     */
    public $subscribed_emails;
    /**
     * @var bool Whether or not the shipment is returned to sender. Value is `true` when any of its checkpoints has subtag `Exception_010` (returning to sender) or `Exception_011` (returned to sender). Otherwise value is `false`.
     */
    public $return_to_sender;
    /**
     * @var string|null The promised delivery date of the order. It uses the format `YYYY-MM-DD`. This has no timezone and uses whatever date you provide.
     */
    public $order_promised_delivery_date;
    /**
     * @var string|null Shipment delivery type- pickup_at_store- pickup_at_courier- door_to_door
     */
    public $delivery_type;
    /**
     * @var string|null Shipment pickup location for receiver
     */
    public $pickup_location;
    /**
     * @var string|null Shipment pickup note for receiver
     */
    public $pickup_note;
    /**
     * @var string|null Official tracking URL of the courier (if any). The language parameter of this link relies on the destination country/region and the language associated with the shipment, if the data regarding the destination country/region and language of the shipment is not available, AfterShip will set the language parameter of the link to "US" by default.
     */
    public $courier_tracking_link;
    /**
     * @var string|null The date and time of the carrier’s first attempt to deliver the package to the recipient.  It uses the shipment recipient’s timezone. The format may differ depending on how the carrier provides it:- YYYY-MM-DDTHH:mm:ss- YYYY-MM-DDTHH:mm:ssZ
     */
    public $first_attempted_at;
    /**
     * @var string|null Delivery instructions (delivery date or address) can be modified by visiting the link if supported by a carrier. The language parameter of this link relies on the destination country/region and the language associated with the shipment, if the data regarding the destination country/region and language of the shipment is not available, AfterShip will set the language parameter of the link to "US" by default.
     */
    public $courier_redirect_link;
    /**
     * @var string|null Additional field required by some carriers to retrieve the tracking info. The shipper’s carrier account number. Refer to our article on  for more details.
     */
    public $tracking_account_number;
    /**
     * @var string|null Additional field required by some carriers to retrieve the tracking info. A type of tracking credential required by some carriers. Refer to our article on  for more details.
     */
    public $tracking_key;
    /**
     * @var string|null Additional field required by some carriers to retrieve the tracking info. The date the shipment was sent, using the format YYYYMMDD. Refer to our article on  for more details.
     */
    public $tracking_ship_date;
    /**
     * @var string|null Whether the tracking is delivered on time or not.
     */
    public $on_time_status;
    /**
     * @var int|float|null The difference days of the on time.
     */
    public $on_time_difference;
    /**
     * @var array[] The tags of the order.
     */
    public $order_tags;
    /**
     * @var AftershipEstimatedDeliveryDateTracking The estimated delivery date of the shipment provided by AfterShip’s AI and shown to the recipients. It uses the format `YYYY-MM-DD` based on the shipment recipient’s timezone.
     */
    public $aftership_estimated_delivery_date;
    /**
     * @var CustomEstimatedDeliveryDateTracking Estimated delivery time of the shipment based on your . It uses the format `YYYY-MM-DD` based on the shipment recipient’s timezone.
     */
    public $custom_estimated_delivery_date;
    /**
     * @var string|null A unique, human-readable identifier for the order.
     */
    public $order_number;
    /**
     * @var FirstEstimatedDeliveryTracking The shipment’s original estimated delivery date. It could be provided by the carrier, AfterShip AI, or based on your custom settings. The format of carrier EDDs may differ depending on how the carrier provides it:- YYYY-MM-DD- YYYY-MM-DDTHH:mm:ss- YYYY-MM-DDTHH:mm:ssZ AfterShip AI and custom EDDs always use the format `YYYY-MM-DD`. All EDDs use the shipment recipient’s timezone.
     */
    public $first_estimated_delivery;
    /**
     * @var LatestEstimatedDeliveryTracking The most recently calculated estimated delivery date. It could be provided by the carrier, AfterShip AI, or based on your custom settings. The format of carrier EDDs may differ depending on how the carrier provides it:- YYYY-MM-DD- YYYY-MM-DDTHH:mm:ss- YYYY-MM-DDTHH:mm:ssZ AfterShip AI and custom EDDs always use the format `YYYY-MM-DD`. All EDDs use the shipment recipient’s timezone.
     */
    public $latest_estimated_delivery;
    /**
     * @var array[] Used to add tags to your shipments to help categorize and filter them easily.
     */
    public $shipment_tags;
    /**
     * @var string|null If you have multiple accounts connected for a single carrier on AfterShip, we have introduced the courier_connection_id field to allow you to specify the carrier account associated with each shipment. By providing this information, you enable us to accurately track and monitor your shipments based on the correct carrier account.(</br>In the event that you do not specify the courier_connection_id, we will handle your shipment using the connection that was created earliest among your connected accounts.
     */
    public $courier_connection_id;
    /**
     * @var NextCouriersTracking[] The next couriers get the second carrier information from user or AfterShip.
     */
    public $next_couriers;
    /**
     * @var string|null (Legacy) Replaced by `origin_country_iso3`. Additional field required by some carriers to retrieve the tracking info. The origin country/region of the shipment. Refer to our article on  for more details.
     */
    public $tracking_origin_country;
    /**
     * @var string|null (Legacy) Replaced by `destination_country_iso3`. Additional field required by some carriers to retrieve the tracking info. The destination country/region of the shipment. Refer to our article on  for more details.
     */
    public $tracking_destination_country;
    /**
     * @var string|null (Legacy) Replaced by `destination_postal_code`. Additional field required by some carriers to retrieve the tracking info. The postal code of the recipient’s address. Refer to our article on  for more details.
     */
    public $tracking_postal_code;
    /**
     * @var string|null (Legacy) Replaced by `destination_state`. Additional field required by some carriers to retrieve the tracking info. The state/province of the recipient’s address. Refer to our article on  for more details.
     */
    public $tracking_state;
    /**
     * @var CarbonEmissionsTracking The model contains the total amount of carbon emissions generated by the shipment. - AfterShip will provide this data only when it is available, and its availability is contingent upon the location and weight information that AfterShip can obtain.- The values will be accessible solely for shipments that have been successfully delivered. However, in the event of a shipping update after the delivery status has been achieved, the value may change.- It’s a paid service and only for Tracking Enterprise users, please contact your customer success manager if you want to know more.
     */
    public $carbon_emissions;
    /**
     * @var string|null The location_id refers to the place where you fulfilled the items.  - If you provide a location_id, the system will automatically use it as the tracking's origin address. However, passing both location_id and any origin address information simultaneously is not allowed.- Please make sure you add your locations .
     */
    public $location_id;
    /**
     * @var string|null The shipping_method string refers to the chosen method for delivering the package. Merchants typically offer various shipping methods to consumers during the checkout process, such as, Local Delivery, Free Express Worldwide Shipping, etc.
     */
    public $shipping_method;
    /**
     * @var int|null By dynamically tracking failed delivery attempts during shipment, this field allows you to pinpoint carriers accountable for the most failures. Analyzing the root cause of these failures enables you to improve carriers' delivery standard operating procedures (SOP), leading to an overall enhancement in delivery service quality.
     */
    public $failed_delivery_attempts;
    /**
     * @var string|null|string The signature_requirement field serves the purpose of validating the service option type, specifically proof of delivery. By collecting the recipient's signature upon delivery, it ensures the package reaches the intended recipient and prevents disputes related to non-delivery or lost packages.</br>
     */
    public $signature_requirement;
}
