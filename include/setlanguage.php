<?php
// Premessa: è già attiva la sessione

// Definisco la lingua di base
$default_language = 'it';

if( isset($_GET['lang']) && $_GET['lang']!='' )
{
    // Se l'utente ha cambiato lingua
    $lang = $_GET['lang'];
}
else
{
    if( isset($_SESSION['lang']) && $_SESSION['lang']!='' )
    {
        // Se è impostata una lingua sulla sessione
        $lang = $_SESSION['lang'];
    }
    else
    {
        // Prima volta che l'utente naviga sul sito
        $lang = $default_language;
    }
}

// Mi salvo l'eventuale nuovo valore sulla sessione
$_SESSION['lang'] = $lang;

// Carico il file di traduzione degli elementi statici
if( is_file("lang/$lang.php") )
{
    $trad_link = "lang/$lang.php";
}
else
{
    $trad_link = "lang/it.php";
}
include($trad_link);