<?php
$title = 'Aggiungi film | Backend Cineteca';
$description = '';
$menu = 'home';
include('header.php'); ?>

<div class="container">
    <h1 class="mt-5">Aggiungi film</h1>
    <p>Qui sotto puoi inserire un nuovo film al Database.</p>

    <?php
    if (isset($_POST['invia']))
    {
        //prelevo dai dal form
        $titolo = addslashes(trim(strip_tags($_POST['titolo'])));
        $durata = addslashes(trim(strip_tags($_POST['durata'])));
        $genere = addslashes(trim(strip_tags($_POST['genere'])));
        $regista = addslashes(trim(strip_tags($_POST['regista'])));
        $anno = addslashes(trim(strip_tags($_POST['anno'])));
        $nazionalita = addslashes(trim(strip_tags($_POST['nazionalita'])));
        $copertina = '';
        $trama = addslashes(trim(strip_tags($_POST['trama'])));

        // Gestione copertina
        //$copertina = $_FILES['copertina'];
        //move_uploaded_file($copertina['tmp_name'], 'copertina/'.$copertina['name']);

        if(isset($_FILES['copertina']))
            {
            $copertina = $_FILES['copertina'];
            // Includo la class upload
            include('class_upload/src/class.upload.php');

            // creo il mio oggetto Upload
            $upload = new \Verot\Upload\Upload($copertina);

            // Verifico se il file è stato correttamente caricato
            if( $upload->uploaded )
            {
                // Salvo l'originale dell'immagine
                $upload->process('copertina/originale/');

                // Ridimensiono e croppo l'immagine
                $upload->image_resize          = true;
                $upload->image_ratio_crop      = true;
                $upload->image_y               = 470;
                $upload->image_x               = 318;

                // Processo l'immagine nella cartella desiderata
                $upload->process('copertina/');

                // Mi salvo il nome del file salvato
                $nome_copertina = $upload->file_dst_name;
            }
        }
        else
        {
            $nome_copertina = '';
        }


        //sql
        $sql = "INSERT INTO film(titolo, durata, genere, registi, anno, nazionalita, copertina, trama) VALUES ('$titolo', '$durata', '$genere', '$regista', '$anno', '$nazionalita', '$nome_copertina', '$trama')";
        $res = $mysqli->query($sql);

        if ($res)
        {
            echo "<div class=\"alert alert-success\">Film aggiunto con successo</div>";
        }
        else
        {
            echo "<div class=\"alert alert-danger\">Errore di inserimento: $mysqli->error</div>";
        }
    }
    ?>

    <div class="box-form mt-5 shadow-lg p-5">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="titolo">Titolo</label>
                        <input type="text" name="titolo" id="titolo" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="durata">Durata</label>
                        <input type="number" min="0" name="durata" id="durata" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="genere">Genere</label>
                        <input type="text" name="genere" id="genere" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="regista">Regista</label>
                        <select name="regista" id="regista" class="form-control">
                            <option value="">-- Seleziona regista --</option>
                            <?php
                            $sql = "SELECT * FROM registi";
                            $res = $mysqli->query($sql);
                            while ($row = $res->fetch_array(MYSQLI_ASSOC)):
                                ?>
                                <option value="<?php echo $row['id_registi'] ?>"><?php echo $row['nome'] . ' ' . $row['cognome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="anno">Anno</label>
                        <input type="number" name="anno" id="anno" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nazionalita">Nazionalità</label>
                        <input type="text" name="nazionalita" id="nazionalita" class="form-control">
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
                        <textarea rows="5" class="form-control editor" name="trama" id="trama"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" name="invia" class="btn btn-primary btn-block">Inserisci Film</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

<?php include('footer.php'); ?>
