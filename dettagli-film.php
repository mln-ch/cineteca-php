<?php
$title = 'Dettaglio film | Backend Cineteca';
$description = '';
$menu = 'home';
include('header.php');
?>

<?php
$id = strip_tags($_GET['id']);
$sql = "SELECT film.*, registi.nome, registi.cognome, registi.nazionalita AS naz_reg FROM film, registi WHERE id_film='$id' AND film.registi=registi.id_registi";
$res = $mysqli->query($sql);

if ($row = $res->fetch_array(MYSQLI_ASSOC)):
    ?>
    <div class="container">
        <h1 class="mt-5"><?php echo $row['titolo']; ?></h1>

        <div class="box-form mt-5 shadow-lg p-5">

            <div class="row">

                <div class="col-md-4">
                    <?php
                    if( $row['copertina'] != '' )
                    {
                        //echo '<img src="copertina/' . $row['copertina'] . '" class="img-fluid">';
                        echo "<img src='copertina/$row[copertina]'>";
                    }
                    else
                    {
                        echo '<img src="https://via.placeholder.com/318x470" class="img-fluid">';
                    }
                    ?>
                </div>

                <div class="col-md-8">
                    <div class="trama">
                        <h2>La trama</h2>
                        <p><?php echo $row['trama']; ?></p>
                    </div>

                    <div class="dati">
                        <p><strong>Anno:</strong> <?php echo $row['anno']; ?></p>
                        <p><strong>Nazionalità:</strong> <?php echo $row['nazionalita']; ?></p>
                        <p><strong>Durata:</strong> <?php echo $row['durata']; ?> minuti</p>
                        <p><strong>Genere:</strong> <?php echo $row['genere']; ?></p>
                        <p>
                            <strong>Regista:</strong> <?php echo $row['nome'] . ' ' . $row['cognome'] . ' - ' . $row['naz_reg']; ?>
                        </p>
                    </div>
                </div>

            </div>

        </div>

        <p class="mt-5"><a href="index.php" class="btn btn-primary">Torna alla lista dei film</a></p>

    </div>

<?php else: ?>

    <div class="container divider">
        <div class="alert alert-danger">Film non trovato!</div>
    </div>

<?php endif; ?>

<?php include('footer.php'); ?>