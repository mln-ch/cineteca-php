<?php
$title = 'Modifica film | Backend Cineteca';
$description = '';
$menu = 'home';
include('header.php');

$id = $_GET['id'];
?>

<div class="container">
    <h1 class="mt-5">Modifica film</h1>
    <p>Qui sotto puoi inserire un nuovo film al Database.</p>

    <?php
    if (isset($_POST['invia']))
    {
        //prelevo dai dal form
        $id = trim(strip_tags($_POST['id_film']));
        $titolo = trim(strip_tags($_POST['titolo']));
        $durata = trim(strip_tags($_POST['durata']));
        $genere = trim(strip_tags($_POST['genere']));
        $regista = trim(strip_tags($_POST['regista']));
        $anno = trim(strip_tags($_POST['anno']));
        $nazionalita = trim(strip_tags($_POST['nazionalita']));
        $trama = trim(strip_tags($_POST['trama']));

        //sql
        $sql = "UPDATE film 
                SET titolo='$titolo', durata='$durata', genere='$genere', regista='$regista', anno='$anno', nazionalita='$nazionalita', trama='$trama'
                WHERE id_film='$id'";
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
    // Recupero i dati del record da modificare
    $sql = "SELECT * FROM film WHERE id_film='$id'";
    $res = $mysqli->query($sql);
    if ($row = $res->fetch_array(MYSQLI_ASSOC)):
        ?>
        <div class="box-form mt-5 shadow-lg p-5">
            <form action="#" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_film" value="<?php echo $row['id_film']; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="titolo">Titolo</label>
                            <input type="text" name="titolo" value="<?php echo $row['titolo']; ?>" id="titolo"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="durata">Durata</label>
                            <input type="number" min="0" name="durata" value="<?php echo $row['durata']; ?>" id="durata"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="genere">Genere</label>
                            <input type="text" name="genere" value="<?php echo $row['genere']; ?>" id="genere"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="regista">Regista</label>
                            <input name="regista" value="<?php echo $row['regista']; ?>" id="regista"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="anno">Anno</label>
                            <input type="number" name="anno" value="<?php echo $row['anno']; ?>" id="anno"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nazionalita">Nazionalità</label>
                            <input type="text" name="nazionalita" value="<?php echo $row['nazionalita']; ?>"
                                   id="nazionalita" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="copertina">Copertina</label>
                            <input type="file" name="copertina" id="copertina" class="form-control-file">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="trama">Trama</label>
                            <textarea rows="5" class="form-control editor" name="trama"
                                      id="trama"><?php echo $row['trama']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" name="invia" class="btn btn-primary btn-block">Modifica Film</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php endif; ?>

</div>

<?php include('footer.php'); ?>
