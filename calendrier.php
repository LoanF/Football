<?php
require("./class/GestionRencontre.php");
require("./class/GestionSaison.php");
require("./class/GestionBDD.php");

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$saison = new GestionSaison($cnx);
$rencontre = new GestionRencontre($cnx);
$annee = $_GET['annee'];
$journee = $_GET['journee'];
?>

<div class="container mx-auto p-4">
    <form method="POST" id="filtreClassement" action="post/envoieFiltre.php">
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
            <div class="p-2 col-2 mb-3 mt-3">
                <div>Journée</div>
                <select name="journee" id="journee" class="form-select">
                    <?php
                    $res = $rencontre->getJournee();
                    while ($row = $res->fetch()) {
                        echo "<option value='" . $row['journee'] . "'";

                        if (isset($journee)) {
                            if ($journee == $row['journee']) {
                                echo "selected";
                            }
                        }

                        echo ">Journée " . $row['journee'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="p-2 align-self-end mb-3 mt-3">
                <button type="submit" class="btn text-white border">Appliquer le filtre</button>
            </div>
        </div>
    </form>

    <div>
        <div class="mt-1 text-primary d-flex justify-content-center">
            <?php   
                $next = "index.php?page=calendrier&annee=".$annee."&journee=". $journee + 1; 
                $previous = "index.php?page=calendrier&annee=".$annee."&journee=". $journee - 1;
            ?>
            <a href=<?php echo $previous ?>>
                <h2 class="p-2 text-primary">
                    <i class="fa-solid fa-caret-left"></i>
                </h2>
            </a>
            <h2 class="p-2">Journée <?php echo $journee; ?></h2>
            <a href=<?php echo $next ?>>
                <h2 class="p-2 text-primary">
                    <i class="fa-solid fa-caret-right"></i>
                </h2>
            </a>
        </div>
    </div>
    
    <?php
    
    $res = $rencontre->getRencontres($annee, $journee);
    $row = $res->fetch();
    $date = date_create($row['date_match']);
    $res = $rencontre->getRencontres($annee, $journee);
    echo '<div class="p-3 bg-primary text-white">'.date_format($date, "l d F").'</div>';
    while ($row = $res->fetch()) {
        
        if ($row['score_domicile'] > $row['score_visiteur']) {
            $domicile = 'text-primary';
            $visiteur = '';
        } else if ($row['score_domicile'] < $row['score_visiteur']) {
            $domicile = '';
            $visiteur = 'text-primary';
        } else {
            $domicile = '';
            $visiteur = '';
        }
        
        echo '<div class="d-flex justify-content-center p-2 border-bottom text-secondary">';
        echo '<div class="custom-width"><div class="d-flex justify-content-end"><div class="text-uppercase font-weight-bold '.$domicile.'">'.$row['nom_club_domicile'].'</div><img class="img_logo-24" src="'.$row['logo_club_domicile'].'"></img></div></div>';
        
        if ($row['isjoue'] == 3) {
            echo '<div><span class="'.$domicile.'">'.$row['score_domicile'].'</span> - <span class="'.$visiteur.'">'.$row['score_visiteur'].'</span></div>';
        } else {
            echo '<div>vs</div>';
        }
        echo '<div class="custom-width"><div class="d-flex justify-content-start"><img class="img_logo-24" src="'.$row['logo_club_visiteur'].'"></img><div class="text-uppercase font-weight-bold '.$visiteur.'">'.$row['nom_club_visiteur'].'</div><div class="logo"></div></div></div>';
        echo '</div>';
    }
    ?>
    <style>
    .custom-width {
        width: calc(50% - 40px);
        padding-left: 20px;
        padding-right: 20px;
        margin-top: auto;
        margin-bottom: auto;
    }
    </style>

</div>