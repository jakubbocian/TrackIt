<?php

session_start();

if(isset($_SESSION['logged_in']) and $_SESSION['logged_in'] == true){

    header("location: tracking/trackings.php");

}else{

    header("Location: accesso/registrazione.php");

}

?>