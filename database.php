<?php

function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "trackit";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
    /*if ($conn->connect_errno) {
        echo json_encode(array('popup' => array('popupName' => 'popDanger', 'title' => "Errore", 'caption' => 'Connessione interrotta, errore nel database!')));
        exit();
    }*/
    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}

/*
    Funzione per eseguire query
    @param $query: stringa contenente la query da eseguire
*/
function query($query)
{
    $conn = OpenCon();
    $res = $conn->query($query);
    CloseCon($conn);
    return $res;
}

/*
    Funzione per eseguire query sicura da sql injection
    @param $query: stringa contenente la query da eseguire con i placeholder
    @param $params: array contenente i parametri da passare al posto dei placeholder
*/
function safeQuery($query, $params)
{
    $conn = OpenCon();
    $stmt = $conn->prepare($query);
    $types = "";
    foreach ($params as $value) {
        if (gettype($value) == "string")
            $types .= "s";
        else if (gettype($value) == "integer")
            $types .= "i";
        else if (gettype($value) == "double")
            $types .= "d";
        else if (gettype($value) == "blob")
            $types .= "b";
    }
    $values = "...[";
    foreach ($params as $value) {
        if(gettype($value) == "string")
            $values .= "'" . $value . "'";
        if(next($params))
            $values .= ", ";
    }
    $values .= "]";
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $res = $stmt->get_result();
    CloseCon($conn);
    return $res;
}

function safeQueryId($query, $params)
{
    $conn = OpenCon();
    $stmt = $conn->prepare($query);
    $types = "";
    foreach ($params as $value) {
        if (gettype($value) == "string")
            $types .= "s";
        else if (gettype($value) == "integer")
            $types .= "i";
        else if (gettype($value) == "double")
            $types .= "d";
        else if (gettype($value) == "blob")
            $types .= "b";
    }
    $values = "...[";
    foreach ($params as $value) {
        if(gettype($value) == "string")
            $values .= "'" . $value . "'";
        if(next($params))
            $values .= ", ";
    }
    $values .= "]";
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $res = $stmt->get_result();
    $id = $conn->insert_id;
    CloseCon($conn);
    return ["queryRes" => $res, "lastId" => $id];
}

?>