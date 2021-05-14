<?php
session_start();

include('include/setlanguage.php');
include('include/costanti.php');
include('include/connessione.php');

if (!isset($_SESSION['log']) || $_SESSION['log'] != true)
{
    if(isset($_COOKIE['log']) && $_COOKIE['log']=='1')
    {
        $sql = "SELECT * FROM utenti WHERE id_utenti='$_COOKIE[id_utenti]'";
        $res = $mysqli->query($sql);
        if($row = $res->fetch_array(MYSQLI_ASSOC))
        {
            $_SESSION['log'] = true;
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['cognome'] = $row['cognome'];
            $_SESSION['id_utenti'] = $row['id_utenti'];
        }
        else
        {
            header('location: login.php');
        }
    }
    else
    {
        // Se l'utente non è loggato, lo reindirizzo alla pagina di login
        header('location: login.php');
    }
}
?>
<!doctype html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $description; ?>">

    <link rel="icon" href="favicon.png">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title><?php echo $title; ?></title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">PHP | Lezione 9</a>

        <div class="user-info text-white">
            <small>Ciao, <?php echo $_SESSION['nome'] . ' ' . $_SESSION['cognome']; ?> (<a class="text-white" href="dettagli-utente.php?id=<?php echo $_SESSION['id_utenti']; ?>">profilo</a>
                | <a class="text-white" href="logout.php">logout</a>)</small>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a href="index.php?lang=it" class="nav-item nav-link <?php echo $lang=='it'?'active':''; ?>">IT</a>
                <a href="index.php?lang=en" class="nav-item nav-link <?php echo $lang=='en'?'active':''; ?>">EN</a>
            </div>
            <span> - </span>

            <div class="navbar-nav">
                <a class="nav-item nav-link <?php echo $menu == 'home' ? 'active' : ''; ?>" href="index.php">Film</a>
                <a class="nav-item nav-link <?php echo $menu == 'registi' ? 'active' : ''; ?>" href="registi.php">Registi</a>
                <a class="nav-item nav-link <?php echo $menu == 'utenti' ? 'active' : ''; ?>"
                   href="utenti.php">Utenti</a>
            </div>
        </div>
    </div>
</nav>
