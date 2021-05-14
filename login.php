<?php
session_start();
include('include/costanti.php');
include('include/connessione.php');
?>
    <!doctype html>
    <html lang="it">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="">

        <link rel="icon" href="favicon.png">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">

        <title>Login</title>
    </head>

    <body>

    <div class="box-login shadow-lg rounded">

        <?php
        // Verifico se l'utente ha premuto sul form di login
        if (isset($_POST['invia']))
        {
            // Recupero i dati compilati e li ripulisco da eventuali caratteri "particolari"
            $user = $mysqli->real_escape_string( $_POST['user'] );
            $pass = $mysqli->real_escape_string( $_POST['pass'] );

            // Criptare la password compilata
            $pass = md5($pass);

            $sql = "SELECT * FROM utenti WHERE username='$user' AND password='$pass'";
            $res = $mysqli->query($sql);
            if ($row = $res->fetch_array(MYSQLI_ASSOC))
            {
                // Esiste 1 record con user e pass compilate
                $_SESSION['log'] = true;
                $_SESSION['id_utenti'] = $row['id_utenti'];
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['cognome'] = $row['cognome'];
                echo '<div class="alert alert-success">Username e password corretti</div>';

                if(isset($_POST['ricordami']) && $_POST['ricordami']=='on')
                {
                    // Creo un cookie della durata di 30 giorni
                    setcookie( 'log', '1', time()+(86400*30) );
                    setcookie( 'id_utenti', $row['id_utenti'], time()+(86400*30) );
                }
            }
            else
            {
                // User o Pass errate
                $_SESSION['log'] = false;
                echo '<div class="alert alert-danger">Username o password errati</div>';
            }
        }
        ?>

        <?php if (isset($_SESSION['log']) && $_SESSION['log'] == true): ?>

            <h2>Accesso effettuato con successo</h2>
            <p>Tra pochi secondi sarai reindirizzato alla pagina principale</p>
            <script>
                window.setTimeout(function () {
                    location.href = 'index.php';
                }, 2000);
            </script>

        <?php else: ?>

            <form method="post" action="#" class="form-signin">
                <h1 class="h3 mb-3 font-weight-normal">Login Area</h1>

                <label for="user" class="sr-only">Username</label>
                <input type="text" id="user" name="user" class="form-control" placeholder="Username" required autofocus>

                <label for="pass" class="sr-only">Password</label>
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>

                <div class="checkbox mb-3 mt-2">
                    <label>
                        <input type="checkbox" value="on" name="ricordami"> Ricordami
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="invia">Login</button>
            </form>

        <?php endif; ?>

    </div>

    </body>
    </html>
<?php $mysqli->close(); ?>