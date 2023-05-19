<?php
include_once "../database.php";
include_once "../trackingsTemplate.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $carrier = $_POST["carrier"];
        $tracking = $_POST["tracking"];

        $res = safeQuery("INSERT INTO tracking (name, carrier, tracking) VALUES (?, ?, ?)", array($name, $carrier, $tracking));


    }

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        echo json_encode(array('code'=>array('behave'=>'replace', 'code'=>trackings())));
    }
?>