<?php
$title = 'Home | Backend Cineteca';
$description = '';
$menu = 'home';
include('header.php'); ?>

<div class="container">
    <h1 class="mt-5">Cineteca</h1>
    <p>Qui sotto trovate la lista dei film</p>
    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'delete')
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM film WHERE id_film='$id'";
        $res = $mysqli->query($sql);

        if ($res)
        {
            echo '<div class="alert alert-success">Film eliminato con successo</div>';
        }
        else
        {
            echo '<div class="alert alert-danger">Errore eliminato:' . $mysqli->error . '</div>';
        }
    }
    ?>
    <div class="box-form mt-5 shadow-lg p-5">

        <?php
        // Prelevo il numero di pagina, se impostato
        if( isset($_GET['pag']) && $_GET['pag']!='' )
        {
            $pag = $_GET['pag'];
        }
        else
        {
            $pag = 1;
        }
        ?>

        <table class="table">
            <thead>
            <tr>
                <th>
                    <?php echo $trad['Titolo']; ?>
                    <a title="Ascendente" href="index.php?orderby=titolo&order=ASC&pag=<?php echo $pag; ?>"><i class="fas fa-angle-up"></i></a>
                    <a title="Discendente" href="index.php?orderby=titolo&order=DESC&pag=<?php echo $pag; ?>"><i class="fas fa-angle-down"></i></a>
                </th>
                <th><?php echo $trad['Genere']; ?></th>
                <th>
                    <?php echo $trad['Durata']; ?>
                    <a title="Ascendente" href="index.php?orderby=durata&order=ASC&pag=<?php echo $pag; ?>"><i class="fas fa-angle-up"></i></a>
                    <a title="Discendente" href="index.php?orderby=durata&order=DESC&pag=<?php echo $pag; ?>"><i class="fas fa-angle-down"></i></a>
                </th>
                <th>
                    <?php echo $trad['Anno']; ?>
                    <a title="Ascendente" href="index.php?orderby=anno&order=ASC&pag=<?php echo $pag; ?>"><i class="fas fa-angle-up"></i></a>
                    <a title="Discendente" href="index.php?orderby=anno&order=DESC&pag=<?php echo $pag; ?>"><i class="fas fa-angle-down"></i></a>
                </th>
                <th><?php echo $trad['Nazionalità']; ?></th>
                <th><?php echo $trad['Azioni']; ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Definisco il campo su cui ordinare i risultati
            if(isset($_GET['orderby']) && $_GET['orderby']!='')
            {
                $orderby = $_GET['orderby'];
            }
            else
            {
                $orderby = 'id_film';
            }

            // Definisco l'ordinamento ascendente/discendente
            if(isset($_GET['order']) && $_GET['order']!='')
            {
                $order = $_GET['order'];
            }
            else
            {
                $order = 'DESC';
            }

            // Definisco quanti elementi per pagina mostrare
            $num_el = 2;

            // Ricavo l'offset per l'SQL
            $offset = ($pag-1) * $num_el;

            $sql = "SELECT * FROM film ORDER BY $orderby $order LIMIT $offset, $num_el";
            $res = $mysqli->query($sql);
            if ($res && $res->num_rows > 0):
                while ($row = $res->fetch_array(MYSQLI_ASSOC)):
                    ?>
                    <tr>
                        <td><?php echo $row["titolo_$lang"]; ?></td>
                        <td><?php echo $row["genere_$lang"]; ?></td>
                        <td><?php echo $row['durata']; ?> minnuti</td>
                        <td><?php echo $row['anno']; ?></td>
                        <td><?php echo $row["nazionalita_$lang"]; ?></td>
                        <td>
                            <a href="dettagli-film.php?id=<?php echo $row['id_film']; ?>"
                               class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
                            <a href="modifica-film.php?id=<?php echo $row['id_film']; ?>"
                               class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                            <a href="index.php?action=delete&id=<?php echo $row['id_film']; ?>"
                               class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="alert alert-warning">Non sono presenti film.</div>
            <?php endif; ?>
            </tbody>
        </table>

        <div class="clearfix">
            <p class="float-left"><a href="aggiungi-film.php" class="btn btn-primary">Aggiungi film</a></p>
            <p class="float-right">
                <?php
                $link_next = "index.php?orderby=$orderby&order=$order&pag=" . ($pag+1);
                $link_prev = "index.php?orderby=$orderby&order=$order&pag=" . ($pag-1);

                // Recupero il totale dei record nella tabella film
                $sql = "SELECT * FROM film";
                $res = $mysqli->query($sql);
                $tot_el = $res->num_rows;

                // Ricavo il numero di pagina finale (totale_record / record_per_pagina)
                $max_pag = ceil($tot_el / $num_el);
                ?>

                <?php if($pag > 1): ?>
                    <a href="<?php echo $link_prev; ?>" class="btn btn-primary"><i class="fas fa-angle-left"></i></a>
                <?php endif; ?>

                <?php if($pag < $max_pag): ?>
                    <a href="<?php echo $link_next; ?>" class="btn btn-primary"><i class="fas fa-angle-right"></i></a>
                <?php endif; ?>
            </p>
        </div>


    </div>

</div>

<?php include('footer.php'); ?>
