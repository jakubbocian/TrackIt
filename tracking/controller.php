<?php
include_once "../database.php";
include_once "trackingsTemplate.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $carrier = $_POST["carrier"];
    $tracking = $_POST["tracking"];

    $res = safeQueryId("INSERT INTO tracking (name, carrier, tracking) VALUES (?, ?, ?)", array($name, $carrier, $tracking));
    $userId = $_SESSION['id'];
    $id = $res['lastId'];
    $res = safeQueryId("INSERT INTO tracking_user (idTracking, idUser) VALUES (?, ?)", array($id, $userId));
    echo json_encode(array('redirect' => array('page' => '../index.html')));
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo json_encode(array('code' => array('behave' => 'replace', 'code' => trackings())));
}
?>