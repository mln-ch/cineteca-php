<?php
$title = 'Modifica film | Backend Cineteca';
$description = '';
$menu = 'home';
include('header.php');

$id = $_GET['id'];
?>

<div class="container">
    <h1 class="mt-5"><i class="fas fa-caret-right"></i> Modifica regista</h1>

    <p>Qui sotto puoi modificare quelle attuali ed inserire quelle corrette.</p>

    <?php
    if (isset($_POST['invia']))
    {
        $id = addslashes(trim(strip_tags($_POST['id_registi'])));
        $nome = addslashes(trim(strip_tags($_POST['nome'])));
        $cognome = addslashes(trim(strip_tags($_POST['cognome'])));
        $data_nascita = addslashes(trim(strip_tags($_POST['data_nascita'])));
        $nazionalita = addslashes(trim(strip_tags($_POST['nazionalita'])));
        $bio = addslashes(trim(strip_tags($_POST['bio'])));

        //sql
        $sql = "UPDATE registi SET

                nome = '$nome', 
                cognome = '$cognome', 
                data_nascita = '$data_nascita', 
                nazionalita = '$nazionalita', 
                bio = '$bio'
                
            WHERE id_registi = '$id'";
        $res = $mysqli->query($sql);

        if ($res)
        {
            echo "<div class=\"alert alert-success\">Film modificato con successo</div>";
        }
        else
        {
            echo "<div class=\"alert alert-danger\">Errore di modifica: $mysqli->error</div>";
        }
    }
    ?>

    <?php
    //recupero i dati del record da modificare
    $sql = "SELECT * FROM registi WHERE id_registi='$id'";
    $res = $mysqli->query($sql);

    if ($row = $res->fetch_array(MYSQLI_ASSOC)):
        ?>
        <div class="box-form mt-5 shadow-lg p-5">
            <form action="#" method="post" enctype="multipart/form-data">

                <!-- un input type hidden non ha nessuna visibilità grafica. serve a passare dei dati in un form -->
                <input type="hidden" name="id_registi" value="<?php echo $row['id_registi']; ?>">


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" value="<?php echo $row['nome']; ?>" id="nome"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cognome">Cognome</label>
                            <input type="text" min="0" name="cognome" value="<?php echo $row['cognome']; ?>"
                                   id="cognome" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="data">Data di Nascita</label>
                            <input type="date" name="data_nascita" value="<?php echo $row['data_nascita']; ?>" id="data"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nazionalita">Nazionalità</label>
                            <input type="text" name="nazionalita" id="nazionalita"
                                   value="<?php echo $row['nazionalita']; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="bio">Biografia <span class="opacity">(1000 caratteri)</span></label>
                            <textarea rows="5" class="form-control editor" name="bio"
                                      id="bio"><?php echo $row['bio']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" name="invia" class="btn btn-primary btn-block">Inserisci Regista
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php endif; ?>

</div>

<?php include('footer.php'); ?>
