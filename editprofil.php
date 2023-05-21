<?php
require("./class/GestionClub.php");
require("./class/GestionBDD.php");
require("./class/GestionUser.php");

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$c = new GestionClub($cnx);
$u = new GestionUser($cnx);

$user = $u->getUser($_SESSION['id']);

?>

<div class="container w-75 mb-3">
    <form action="post/envoieProfil.php" method="post" enctype="multipart/form-data" class="form-register">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom :</label>
        <input type="text" name="nom" class="form-control" placeholder="Votre nom" value="<?php echo $user->getNom_uti() ?>" required/>
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">Prénom :</label>
        <input type="text" name="prenom" class="form-control" placeholder="Votre prénom" value="<?php echo $user->getPrenom_uti() ?>" required/>
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photo de profil :</label>
        <input type="file" name="photo" id="photo" class="form-control"/>
    </div>
    <div class="mb-3">
        <label for="equipe" class="form-label">Équipe favorite :</label>

        <select name="equipe" class="form-select">
            <option value="" selected>-- Choisir équipe --</option>
            <?php
            $tab = $c->getListClub();
            foreach ($tab as $equipe) {
                if($equipe->getId_Club() == $user->getId_club()) { $selected = 'selected'; } else { $selected = ''; }
                echo "<option value='" . $equipe->getId_Club() . "'".$selected.">" . $equipe->getNom_Club() . "</option>";
            }
            
            unset($equipe);
            ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Modifier le profil</button>
        <button type="reset" class="btn btn-primary">Annuler</button></a
    </div>
    </form>
</div>