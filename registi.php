<?php
$title = 'Registi | Backend Cineteca';
$description = '';
$menu = 'registi';
include('header.php'); ?>

<div class="container">
    <h1 class="mt-5">Lista registi</h1>
    <p>Di seguito la lista dei registi salvati nel Database</p>

    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'delete')
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM registi WHERE id_registi='$id'";
        $res = $mysqli->query($sql);

        if ($res)
        {
            echo "<div class=\"alert alert-success\">Regista eliminato con successo</div>";
        }
        else
        {
            echo "<div class=\"alert alert-danger\">Errore eliminato: $mysqli->error </div>";
        }
    }
    ?>

    <div class="box-form mt-5 shadow-lg p-5">

        <table class="table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Nazionalità</th>
                <th>Età</th>
                <th>Azioni</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM registi";
            $res = $mysqli->query($sql);

            if ($res && $res->num_rows > 0):
                while ($row = $res->fetch_array(MYSQLI_ASSOC)): ?>
                    <tr>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['cognome']; ?></td>
                        <td><?php echo $row['nazionalita']; ?></td>
                        <td>
                            <?php
                            $date = date_create($row['data_nascita']);
                            $date_now = date_create(date("Y-m-d"));
                            $eta = date_diff($date, $date_now);
                            echo $eta->format("%y"); ?>
                        </td>
                        <td>
                            <a href="dettagli-regista.php?id=<?php echo $row['id_registi']; ?>" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
                            <a href="modifica-regista.php?id=<?php echo $row['id_registi']; ?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                            <a href="registi.php?action=delete&id=<?php echo $row['id_registi']; ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            <?php else: ?>
                <div class="alert alert-warning">Non sono presenti registi.</div>
            <?php endif; ?>
            </tbody>
        </table>

        <div class="clearfix">
            <p class="float-left"><a href="aggiungi-regista.php?id=" class="btn btn-primary">Aggiungi regista</a></p>
            <p class="float-right">
                <a href="#" class="btn btn-primary"><i class="fas fa-angle-left"></i></a>
                <a href="#" class="btn btn-primary"><i class="fas fa-angle-right"></i></a>
            </p>
        </div>

    </div>

</div>

<?php include('footer.php'); ?>
