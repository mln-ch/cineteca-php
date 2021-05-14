<?php
$title = 'Aggiungi utente | Backend Cineteca';
$description = '';
$menu = 'utenti';
include('header.php'); ?>

<div class="container">
    <h1 class="mt-5">Aggiungi utente</h1>
    <p>Qui sotto puoi inserire un nuovo utente al Database.</p>

    <?php
    if (isset($_POST['invia']))
    {
        $nome = trim(strip_tags($_POST['nome']));
        $cognome = trim(strip_tags($_POST['cognome']));
        $email = trim(strip_tags($_POST['email']));
        $username = trim(strip_tags($_POST['username']));
        $password = md5(trim(strip_tags($_POST['password'])));
        $bio = trim(strip_tags($_POST['bio']));

        $sql = "INSERT INTO utenti(nome, cognome, email, username, password, bio) VALUES ('$nome', '$cognome', '$email', '$username', '$password', '$bio')";
        $res = $mysqli->query($sql);

        if($res)
        {
            echo "<div class=\"alert alert-success\">Utente aggiunto con successo.</div>";
        }
        else
        {
            echo "<div class=\"alert alert-danger\">Errore di inserimento: $mysqli->error</div>";
        }

    }
    ?>

    <div class="box-form mt-5 shadow-lg p-5">
        <form action="#" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cognome">Cognome</label>
                        <input type="text" name="cognome" id="cognome" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="bio">Biografia</label>
                        <textarea rows="5" class="form-control editor" name="bio" id="bio"></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" name="invia" class="btn btn-primary btn-block">Inserisci</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

<?php include('footer.php'); ?>
