<?php
require("./class/GestionClassement.php");
require("./class/GestionSaison.php");
require("./class/GestionBDD.php");

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$saison = new GestionSaison($cnx);
$classement = new GestionClassement($cnx);
$annee = $_GET['annee'];
?>

<div class="container mx-auto p-4">
    <form method="POST" id="filtreClassement" action="post/envoieSaison.php">
        <div class="p-3 bg-primary text-white d-flex justify-content-center">
            <div class="p-2 col-2 mb-3 mt-3">
                <div>Saison</div>
                <select name="annee" id="annee" class="form-select">
                    <?php
                    $res = $saison->getSaison();
                    while ($row = $res->fetch()) {
                        echo "<option value='" . $row['annee'] . "'";

                        if (isset($annee)) {
                            if ($annee == $row['annee']) {
                                echo "selected";
                            }
                        }

                        echo ">" . $row['annee'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="p-2 align-self-end mb-3 mt-3">
                <button type="submit" class="btn text-white border">Appliquer le filtre</button>
            </div>
        </div>
    </form>
    
    <table class="table table-hover mt-4 bg-secondary bg-opacity-10">
    <thead class="bg-primary text-white text-center">
        <tr>
            <th scope="col">Position</th>
            <th scope="col">Club</th>
            <th scope="col">Points</th>
            <th scope="col">Joués</th>
            <th scope="col">Gagnés</th>
            <th scope="col">Nuls</th>
            <th scope="col">Perdus</th>
            <th scope="col">Buts pour</th>
            <th scope="col">Buts contre</th>
        </tr>
    </thead>
    <tbody class="align-middle text-secondary border-secondary">
    <?php
    $pos = 1;
    $res = $classement->getClassement($annee, 1);
    while ($row = $res->fetch()) {
    echo "<tr>
            <th scope='row' class='text-center text-primary'>".$pos."</th>
            <td class='text-left text-uppercase text-primary'><a href='index.php?page=infoclub&club=".$row['id_club']."'><img class='img_logo-40' src='".$row['logo']."'/></a>".$row['nom_club']."</td>
            <td class='text-center text-primary'>".$row['nb_points']."</td>
            <td class='text-center'>".$row['nb_match_joue']."</td>
            <td class='text-center'>".$row['nb_match_gagne']."</td>
            <td class='text-center'>".$row['nb_match_nul']."</td>
            <td class='text-center'>".$row['nb_match_perdu']."</td>
            <td class='text-center'>".$row['nb_buts_marques']."</td>
            <td class='text-center'>".$row['nb_buts_encaisse']."</td>
        </tr>";
    $pos += 1;
    }?>
    </tbody>
    </table>