<?php
$title = 'Aggiungi regista | Backend Cineteca';
$description = '';
$menu = 'registi';
include('header.php'); ?>

<div class="container">
    <h1 class="mt-5">Aggiungi regista</h1>
    <p>Qui sotto puoi inserire un nuovo regista al Database.</p>
    <?php
    if (isset($_POST['invia']))
    {
        $nome = trim(strip_tags($_POST['nome']));
        $cognome = trim(strip_tags($_POST['cognome']));
        $nazionalita = trim(strip_tags($_POST['nazionalita']));
        $regista = trim(strip_tags($_POST['regista']));
        $data_nascita = $_POST['data'];

        $sql = "INSERT INTO registi(nome, cognome, nazionalita, data_nascita) VALUES ('$nome', '$cognome', '$nazionalita', '$data_nascita')";
        $res = $mysqli->query($sql);

        if ($res)
        {
            echo "<div class=\"alert alert-success\">Regista aggiunto con successo.</div>";
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
                        <label for="nazionalita">Nazionalità</label>
                        <input type="text" name="nazionalita" id="nazionalita" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data">Data di nascita</label>
                        <input type="date" name="data" id="data" class="form-control">
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
