<?php
include_once "../database.php";

//REGISTRAZIONE
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = hash("sha256", $_POST["password"]);

    $res = safeQuery("SELECT * FROM user WHERE username = ? OR email = ?", array($username, $email));
    if($res->num_rows>0){
        echo "Username o email già in uso";
    } else {
        safeQuery("INSERT INTO utenti (nome, cognome, username, email, password) VALUES (?, ?, ?, ?, ?)", array($name, $surname, $username, $email, $password));
        header("Location: ../index.php");
    }
}

//LOGIN
if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $email = $_GET["email"];
    $password = hash("sha256", $_GET["password"]);

    $res = safeQuery("SELECT * FROM user WHERE email = ? AND password = ?", array($email, $password));
    if($res->num_rows==0){
        echo json_encode(array('code'=>array('behave'=>'replace', 'code'=>'Email o password errati')));
    } else {
        if(isset($_GET["ricordami"])){
            setcookie("username", $username, time() + (86400 * 30), "/");
            setcookie("password", $password, time() + (86400 * 30), "/");
        }
        echo json_encode(array('redirect'=>array('page'=>'index.html')));
    }
}

?>