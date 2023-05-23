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

        curl_close($ch);
        
        $code .= "<li>";
        $code .= "<h3>" . $row["name"] . "</h3>";
        $code .= "<div class='shipment-details'>";
        $code .= "<h2>Shipment Details</h2>";
        $code .= "<p><span>Carrier:</span> " . $row["carrier"] . "</p>";
        $code .= "<p><span>Tracking Number:</span> " . $row["tracking"] . "</p>";
        $code .= "<p><span>Tracking Status:</span> " . $response["tracking_status"]["status_details"] . "</p>";
        $code .= "<p><span>Tracking Date:</span> " . explode("T",$response["tracking_status"]["status_date"])[0] . "</p>";
        $code .= "<p><span>Tracking Location:</span> " . $response["tracking_status"]["location"]["city"] . " " . $response["tracking_status"]["location"]["state"] . " " . $response["tracking_status"]["location"]["country"] . "</p>";
        $code .= "</div>";
        $code .= "</li>";
    }
    $code .= "</ul>";
    return $code;
}
?>