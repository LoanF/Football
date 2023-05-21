<?php
require("./class/GestionClub.php");
require("./class/GestionBDD.php");

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$c = new GestionClub($cnx);
$club = $_GET['club'];

$club = $c->getInfoClub($club);
?>

<div class="container d-flex justify-content-center mt-5 border border-secondary rounded">
    <img class="m-4" src="<?php echo $club->getLogo_club(); ?>"/>
    <div class="mt-5 text-primary">
        <div><?php echo $club->getNom_club(); ?></div>
        <div>Ville : <?php echo $club->getVille_club(); ?></div>
        <div>Stade : <?php echo $c->getStade($club->getId_stade()); ?></div>
        <div>Année de fondation : <?php if(!$club->getAnnee_fondation() == null) {echo $club->getAnnee_fondation();}else{echo 'Non définie';} ?></div>
        <div>Président : <?php if(!$club->getPresident() == null) {echo $club->getPresident();}else{echo 'Non définie';} ?></div>
        <div>Entraineur : <?php if(!$club->getEntraineur() == null) {echo $club->getEntraineur();}else{echo 'Non définie';} ?></div>
    </div>
</div>