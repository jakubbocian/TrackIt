<?php
include_once "../database.php";
function trackings()
{
    $res = safeQuery("SELECT * FROM tracking");
    $tracking = array();
    $code = "";
    $ch = curl_init();
    $url = "https://api.goshippo.com/tracks/";
    while ($row = $res->fetch_assoc()) {
        $tracking[] = $row;
        $url .= $row["carrier"] . "/" . $row["tracking"];
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = [
            "Authorization: ShippoToken shippo_test_2234e4097ef0f6b7acb5619b75d6e50ecaeb2dd5"
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $server_output = curl_exec($ch);
        $server_output = json_decode($server_output, true);
        curl_close($ch);

        $code .= "<div class='tracking'>";
        $code .= "<h1>" . $row["name"] . "</h1>";
        $code .= "<h2>" . $row["carrier"] . "</h2>";
        $code .= "<h3>" . $row["tracking"] . "</h3>";
        $code .= "<p>" . $server_output["tracking_status"]["status"] . "<p>";
        $code .= "</div>";

    }
    return $code;
}
?>