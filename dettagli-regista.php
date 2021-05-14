<?php
$title = 'Dettagli Utentee | Backend Cineteca';
$description = '';
include('header.php'); 

$id = $_GET['id'];

$sql = "SELECT * FROM registi WHERE id_registi = '$id'";
$res = $mysqli -> query($sql);

if($row = $res -> fetch_array(MYSQLI_ASSOC)):
?>

    <div class="container-fluid pellicola">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="imgthumb">
                        <div class="img"></div>
                    </div>
                </div>

                <div class="col-lg h1-white">
                    <h1><strong><?php echo $row['nome'].' '.$row['cognome']; ?></strong> <span>regista</span></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container body">
        <div class="row">
            <div class="col-3">
                <h3>Bio:</h3>
                <hr>

                <p>
                    <?php echo $row['bio']; ?>
                </p>
            </div>

            <div class="col-9">
                <div class="row content">
                    <div class="col">
                        <h2><strong>Nome:</strong> <span class="opacity space"><?php echo $row['nome']; ?></span></h2>
                    </div>

                    <div class="col">
                        <h2><strong>Cognome:</strong> <span class="opacity space"><?php echo $row['cognome']; ?></span></h2>
                    </div>
                </div>

                <hr>

                <div class="row content-2">
                    <div class="col">
                        <h2><strong>Età:</strong> <span class="opacity space"><?php
                    
                    /**
                    * Calcolo l'età del regista in anni
                    * @param date
                    * @return date
                    */
                    function quanti_anni($data) {
                        $oggi = new DateTime();
                        $eta_regista = new Datetime($data);
                        $anni = $oggi->diff($eta_regista);
                        $anni = $anni->format('%y');

                        return $anni;
                    }

                    setlocale(LC_TIME, 'it_IT');
                    $format = strftime("%d %B %Y", strtotime($row['data_nascita']));

                    echo quanti_anni($row['data_nascita'])?> anni</span> <span class="opacity-plus">(<?php echo $format;?>)</span></h2>
                    </div>
                    <div class="col">
                        <h2><strong>Nazionalità: </strong> <span class="opacity space"> <?php echo $row['nazionalita']; ?></span></h2>
                    </div>
                </div>

                <hr>
                <h3>Film:</h3>
                <?php
                $sql = "SELECT * FROM film WHERE registi='$id'";
                $res = $mysqli->query($sql);
                if($res->num_rows > 0):
                ?>
                    <div class="row row-movies">
                        <?php while($row = $res->fetch_array(MYSQLI_ASSOC)): ?>
                            <div class="col3 shadow bg-white filmm">
                                <a href="dettagli-film.php?id=<?php echo $row['id_film']; ?>">
                                    <?php if($row['copertina'] != ''): ?>
                                        <img src="copertina/<?php echo $row['copertina']; ?>" class="img-fluid">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/318x470" class="img-fluid">
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p>Non sono presenti film di questo regista</p>
                <?php endif; ?>

                <div class="row btn-row">
                    <button type="button" class="btn btn-primary">Torna alla lista film</button>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>       
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<?php else: ?>

    <div class="container">
    <div class="alert alert-danger">
        Regista non trovato.
    </div>
</div>

<?php
endif;
    include('footer.php');
?>