<?php
include_once "../database.php";
include_once "trackingsTemplate.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $carrier = $_POST["carrier"];
    $tracking = $_POST["tracking"];
    $userId = $_SESSION['id'];

    $ch = curl_init();

    $url = "https://api.goshippo.com/tracks/";
    $url .= $carrier . "/" . $tracking;


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

    

    //check if response is 400
    $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($responseCode == 400 || $responseCode == 404) {
        echo json_encode(array('code' => array('behave' => 'replace', 'code' => 'Invalid carrier or tracking number')));
        
        return;
    }


    $trackingQuery = query("SELECT * FROM tracking WHERE tracking = '" . $tracking . "' AND carrier = '" . $carrier . "'");
    
    if($name == ""){
        echo json_encode(array('code' => array('behave' => 'replace', 'code' => 'Name cannot be empty')));
        return;
    }

    if(query("SELECT * FROM tracking WHERE name = '" . $name . "'")->num_rows > 0){
        echo json_encode(array('code' => array('behave' => 'replace', 'code' => 'Name already exists')));
        return;
    }

    if ($trackingQuery->num_rows == 0) {
        $res = safeQueryId("INSERT INTO tracking (name, carrier, tracking) VALUES (?, ?, ?)", array($name, $carrier, $tracking));
        $id = $res['lastId'];
        $res = safeQueryId("INSERT INTO tracking_user (idTracking, idUser) VALUES (?, ?)", array($id, $userId));
        echo json_encode(array('redirect' => array('page' => '../index.php')));
        return;
    } else {
        if (query("SELECT * FROM tracking_user WHERE idTracking = " . $trackingQuery->fetch_assoc()['id'] . " AND idUser = " . $userId)->num_rows == 0) {
            $res = safeQueryId("INSERT INTO tracking_user (idTracking, idUser) VALUES (?, ?)", array($trackingQuery->fetch_assoc()['id'], $userId));
            echo json_encode(array('redirect' => array('page' => '../index.php')));
            return;
        } else {
            echo json_encode(array('code' => array('behave' => 'replace', 'code' => 'Tracking already exists in this account')));
            return;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["trackings"])) {
        echo json_encode(array('code' => array('behave' => 'replace', 'code' => trackings())));
    }
    if (isset($_GET["carriers"])) {
        echo json_encode(array('code' => array('behave' => 'replace', 'code' => carriers($_GET["carriers"]))));
    }
    if(isset($_GET["idDelete"])){
        $id = $_GET["idDelete"];
        $res = safeQueryId("DELETE FROM tracking WHERE id = ?", array($id));
        if(query("SELECT * FROM tracking_user WHERE idTracking = " . $id)->num_rows == 0){
            $res = safeQueryId("DELETE FROM tracking WHERE id = ?", array($id));
        }
        echo json_encode(array('redirect' => array('page' => 'trackings.php')));
        exit();
    }
}
