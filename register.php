<?php
require("./class/GestionClub.php");
require("./class/GestionBDD.php");

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$c = new GestionClub($cnx);
?>

<div class="container w-75 mb-3">
    <h4>Inscription</h4>
<div class="border p-3">
<form action="post/envoieIns.php" method="post" enctype="multipart/form-data" class="form-register">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom :</label>
        <input type="text" name="nom" class="form-control" placeholder="Votre nom" required/>
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">Prénom :</label>
        <input type="text" name="prenom" class="form-control" placeholder="Votre prénom" required/>
    </div>
    <div class="mb-3">
        <label for="mail" class="form-label">Mail :</label>
        <input type="email" name="mail" class="form-control" placeholder="Saisissez un e-mail" required/>
    </div>
    <div class="mb-3">
        <label for="pswd" class="form-label">Mot de passe :</label>
        <input type="password" name="pswd" class="form-control" placeholder="Saisissez un mot de passe" required/>
    </div>
    <div class="mb-3">
        <label for="sexe" class="form-label">Sexe :</label><br>
        <div class="form-check form-check-inline">
            <input type="radio" name="sexe" class="btn-check" value="h" id="option1" required></input>
            <label class="btn btn-outline-secondary" for="option1">Homme</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" name="sexe" class="btn-check" value="f" id="option2" required></input>
            <label class="btn btn-outline-secondary" for="option2">Femme</label>
        </div>
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
                echo "<option value='" . $equipe->getId_Club() . "'>" . $equipe->getNom_Club() . "</option>";
            }
            
            unset($equipe);
            ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Créer le compte</button>
        <button type="reset" class="btn btn-primary">Annuler</button>
    </div>
</form>
</div>
</div>