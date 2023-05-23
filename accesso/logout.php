<?php

session_start();

// Rimuove tutte le variabili di sessione
session_unset();

// Distrugge la sessione attiva
session_destroy();

// Reindirizza l'utente alla pagina di login

header("Location: ../index.html");
exit();

?>