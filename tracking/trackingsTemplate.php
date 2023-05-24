<?php
include_once "../database.php";

session_start();
function trackings()
{
    $userId = $_SESSION['id'];
    $res = query("SELECT * FROM tracking WHERE id IN (SELECT idTracking FROM tracking_user WHERE idUser = " . $userId . ")");
    $tracking = array();
    $code = "";
    $ch = curl_init();
    $url = "https://api.goshippo.com/tracks/";

    $code .= "<ul class='shipment-list'>";
    while ($row = $res->fetch_assoc()) {
        $url = "https://api.goshippo.com/tracks/";
        $tracking[] = $row;
        $url .= $row["carrier"] . "/" . $row["tracking"];



        curl_setopt_array(
            $ch,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: ShippoToken shippo_test_2234e4097ef0f6b7acb5619b75d6e50ecaeb2dd5',
                    'Content-Type: application/json'
                ),
            )
        );

        $response = curl_exec($ch);

        $response = json_decode($response, true);

        $history = $response["tracking_history"];
        //$history = array_reverse($history);

        curl_close($ch);
        
        $code .= "<li>";
        $code .= "<h3>" . $row["name"] . "</h3>";
        $code .= "<div class='shipment-details'>";
        $code .= "<h2>Shipment Details</h2>";
        $code .= "<p><span>Carrier:</span> " . $row["carrier"] . "</p>";
        $code .= "<p><span>Tracking Number:</span> " . $row["tracking"] . "</p>";
        $code .= "<p><span>Estimated Delivery Date:</span> " . explode("T",$response["eta"])[0] . "</p>";
        $code .= "<table>";
        $code .= "<thead><tr><th>Tracking Status</th><th>Tracking Date</th><th>Tracking Location</th></tr></thead>";
        $code .= "<tbody>";
        while($row = array_pop($history)){
            $code .= "<tr>";
            if($row["status_details"] != null){
                $code .= "<td>" . $row["status_details"] . "</td>";
            } else {
                $code .= "<td> </td>";
            }
            if($row["status_date"] != null){
                $code .= "<td>" . explode("T",$row["status_date"])[0] . "</td>";
            } else {
                $code .= "<td> </td>";
            }
            if($row["location"] != null){
                $code .= "<td>" . $row["location"]["city"] . " " . $row["location"]["state"] . " " . $row["location"]["country"] . "</td>";
            } else {
                $code .= "<td> </td>";
            }
            $code .= "</tr>";
        }
        $code .= "</tbody>";
        $code .= "</table>";
        $code .= "</div>";
        $code .= "</li>";
    }
    $code .= "</ul>";
    return $code;
}

function carriers($letters){
    $carrierNames = array(
        'airterra' => 'Airterra',
        'apc_postal' => 'APC Postal',
        'apg' => 'APG',
        'aramex' => 'Aramex',
        'asendia_us' => 'Asendia US',
        'australia_post' => 'Australia Post',
        'axlehire' => 'Axlehire',
        'better_trucks' => 'BetterTrucks',
        'borderguru' => 'BorderGuru',
        'boxberry' => 'Boxberry',
        'bring' => 'Bring',
        'canada_post' => 'Canada Post',
        'cdl' => 'CDL',
        'chronopost' => 'Chronopost',
        'collect_plus' => 'CollectPlus',
        'correios_br' => 'CorreiosBR',
        'correos_espana' => 'Correos España',
        'couriersplease' => 'Couriers Please',
        'colissimo' => 'Colissimo',
        'deutsche_post' => 'Deutsche Post',
        'dhl_benelux' => 'DHL Benelux',
        'dhl_ecommerce' => 'DHL eCommerce',
        'dhl_express' => 'DHL Express',
        'dhl_germany_c2c' => 'DHL Germany C2C',
        'dhl_germany' => 'DHL Germany',
        'dpd_germany' => 'DPD GERMANY',
        'dpd' => 'DPD',
        'dpd_uk' => 'DPD UK',
        'estafeta' => 'Estafeta',
        'fastway_australia' => 'Aramex',
        'fedex' => 'FedEx',
        'globegistics' => 'Globegistics',
        'gls_us' => 'GLS US',
        'gophr' => 'Gophr',
        'gso' => 'GSO',
        'hermes_germany_b2c' => 'Hermes Germany B2C',
        'hermes_uk' => 'Evri UK',
        'hongkong_post' => 'Hongkong Post',
        'lasership' => 'LaserShip',
        'lso' => 'LSO',
        'mondial_relay' => 'Mondial Relay',
        'new_zealand_post' => 'New Zealand Post',
        'nippon_express' => 'Nippon Express',
        'ontrac' => 'OnTrac',
        'orangeds' => 'OrangeDS',
        'parcelforce' => 'Parcelforce',
        'parcel' => 'Parcel',
        'passport' => 'Passport',
        'pcf' => 'PCF',
        'posti' => 'Posti',
        'purolator' => 'Purolator',
        'royal_mail' => 'Royal Mail',
        'rr_donnelley' => 'ePost Global',
        'russian_post' => 'Russian Post',
        'sendle' => 'Sendle',
        'skypostal' => 'SkyPostal',
        'stuart' => 'Stuart',
        'swyft' => 'Swyft',
        'uds' => 'UDS',
        'ups' => 'UPS',
        'usps' => 'USPS',
        'yodel' => 'Yodel'
    );

    $carrierCode = array_flip($carrierNames);
    

    //$letters = strtolower($letters);

    $code = "";

    foreach($carrierCode as $key => $value){
        if(stripos($key, $letters) !== false){
            $code .= "<option>" . $carrierNames[$value] . "</option>";
        }
    }
    return $code;
}
?>