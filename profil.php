<?php    
    if (!isset($_SESSION['id'])) {
        header("Location: index.php");
    }
    
    require("./class/GestionUser.php");
    require("./class/GestionClub.php");
    require("./class/GestionBDD.php");

    $bdd = new GestionBDD();
    $cnx = $bdd->connect();
    $u = new GestionUser($cnx);
    $c = new GestionClub($cnx);
?>
<br><br>
<div class="container w-25 border border-secondary rounded p-2">
    <?php
    $user = $u->getUser($_SESSION['id']);
    ?>
    <div class="w-50 mx-auto">
        <img class="w-100 rounded-circle" src="<?php echo $user->getImage_uti(); ?>"/>
    </div>
    <div class="mt-4 mx-auto">
        <div>Nom : <?php echo $user->getNom_uti(); ?></div>
        <div>Prénom : <?php echo $user->getPrenom_uti(); ?></div>
        <div>Sexe : <?php if($user->getSexe_uti() == 'h') {echo 'Homme';} else {echo 'Femme';} ?></div>
        <div>Date d'inscription : <?php echo $user->getDate_inscription(); ?></div>
        <div>Mail : <?php echo $user->getMail_uti(); ?></div>
        <div>Club : <?php echo $c->getNomClub($user->getId_club()); ?></div>
        <a href="index.php?page=editprofil"><i class="fa-solid fa-pen border-top border-secondary w-100 text-center h5 pt-2 mt-2 text-primary"></i></a>
    </div>
</div>