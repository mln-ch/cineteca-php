<?php
$title = 'Utenti | Backend Cineteca';
$description = '';
$menu = 'utenti';
include('header.php'); ?>

<div class="container">
    <h1 class="mt-5">Lista utenti</h1>
    <p>Di seguito la lista degli utenti che possono accedere all'area riservata</p>

    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'delete')
    {
        $id = $_GET['id'];

        $sql = "DELETE FROM utenti WHERE id_utenti='$id'";
        $res = $mysqli->query($sql);

        if ($res)
        {
            echo "<div class=\"alert alert-success\">Utente eliminato con successo</div>";
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
                <th>Username</th>
                <th>Email</th>
                <th>Azioni</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM utenti";
            $res = $mysqli->query($sql);

            if ($res && $res->num_rows > 0):
                while ($row = $res->fetch_array(MYSQLI_ASSOC)): ?>
                    <tr>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['cognome']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a href="dettagli-utente.php?id=<?php echo $row['id_utenti']; ?>"
                               class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
                            <a href="modifica-utente.php?id=<?php echo $row['id_utenti']; ?>"
                               class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                            <a href="utenti.php?action=delete&id=<?php echo $row['id_utenti']; ?>"
                               class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="alert alert-warning">Non sono presenti utenti.</div>
            <?php endif; ?>

            </tbody>
        </table>

        <div class="clearfix">
            <p class="float-left"><a href="aggiungi-utente.php" class="btn btn-primary">Aggiungi utente</a></p>
            <p class="float-right">
                <a href="#" class="btn btn-primary"><i class="fas fa-angle-left"></i></a>
                <a href="#" class="btn btn-primary"><i class="fas fa-angle-right"></i></a>
            </p>
        </div>

    </div>

</div>

<?php include('footer.php'); ?>
