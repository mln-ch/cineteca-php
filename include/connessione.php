<?php
// Esegue la connessione al DB
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($mysqli->errno){
  echo "Errore connessione DB: " . $mysqli->error;
}
