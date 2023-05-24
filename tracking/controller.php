<?php
include_once "../database.php";
include_once "trackingsTemplate.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $carrier = $_POST["carrier"];
    $tracking = $_POST["tracking"];
    $userId = $_SESSION['id'];

    $trackingQuery = query("SELECT * FROM tracking WHERE tracking = '" . $tracking . "' AND carrier = '" . $carrier . "'");
    if ($trackingQuery->num_rows == 0) {
        $res = safeQueryId("INSERT INTO tracking (name, carrier, tracking) VALUES (?, ?, ?)", array($name, $carrier, $tracking));
        $id = $res['lastId'];
        $res = safeQueryId("INSERT INTO tracking_user (idTracking, idUser) VALUES (?, ?)", array($id, $userId));
        echo json_encode(array('redirect' => array('page' => '../index.html')));
    } else {
        if(query("SELECT * FROM tracking_user WHERE idTracking = " . $trackingQuery->fetch_assoc()['id'] . " AND idUser = " . $userId)->num_rows == 0){
            $res = safeQueryId("INSERT INTO tracking_user (idTracking, idUser) VALUES (?, ?)", array($trackingQuery->fetch_assoc()['id'], $userId));
            echo json_encode(array('redirect' => array('page' => '../index.html')));
        } else {
            echo json_encode(array('code' => array('behave' => 'replace', 'code' => 'Tracking already exists in this account')));
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
}
