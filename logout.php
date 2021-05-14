<?php
// Distruggo la sessione
session_start();
session_destroy();

// Distruggere l'eventuale cookie impostato
if(isset($_COOKIE['log']))
{
    setcookie('log', '', time()-1);
}

// Redirect alla pagina di login
header('location: login.php');