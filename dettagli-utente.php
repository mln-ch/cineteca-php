<?php
$title = 'Dettagli Utentee | Backend Cineteca';
$description = '';
include('header.php'); 

$id = $_GET['id'];

$sql = "SELECT * FROM utenti WHERE id_utenti = '$id'";
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
                    <h1><strong><?php echo $row['username']; ?></strong> <span>utente</span></h1>
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
                        <h2><strong>Username:</strong> <span class="opacity space"><?php echo $row['username']?></span> <span
                                class="opacity-plus"></span></h2>
                    </div>
                    <div class="col">
                        <h2><strong>Email: </strong> <span class="opacity space"> <?php echo $row['email']; ?></span></h2>
                    </div>
                </div>

                <hr>
                <h3>Preferiti:</h3>

                <div class="row row-movies">
                    <div class="col3 shadow bg-white filmm">
                        <a data-fancybox="gallery" href="img/450x550.png"><img src="/img/130x180.png"></a>
                    </div>

                    <div class="col3 shadow bg-white filmm">
                        <a data-fancybox="gallery" href="img/450x550.png"><img src="/img/130x180.png"></a>
                    </div>

                    <div class="col3 shadow bg-white filmm">
                        <a data-fancybox="gallery" href="img/450x550.png"><img src="/img/130x180.png"></a>
                    </div>

                    <div class="col3 shadow bg-white filmm">
                        <a data-fancybox="gallery" href="img/450x550.png"><img src="/img/130x180.png"></a>
                    </div>

                    <div class="col3 shadow bg-white filmm">
                        <a data-fancybox="gallery" href="img/450x550.png"><img src="/img/130x180.png"></a>
                    </div>

                    <div class="col3 shadow bg-white filmm">
                        <a data-fancybox="gallery" href="img/450x550.png"><img src="/img/130x180.png"></a>
                    </div>
                    
                    <div class="col3 shadow bg-white filmm">
                        <a data-fancybox="gallery" href="img/450x550.png"><img src="/img/130x180.png"></a>
                    </div>

                    <div class="col3 shadow bg-white filmm">
                        <a data-fancybox="gallery" href="img/450x550.png"><img src="/img/130x180.png"></a>
                    </div>

                </div>

                <div class="row btn-row">
                    <a href="utenti.php" type="button" class="btn btn-primary">Torna alla lista utenti</a>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>       
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<?php else: ?>

    <div class="container">
    <div class="alert alert-danger">
        Utente non trovato.
    </div>
</div>

<?php
endif;
    include('footer.php');
?>