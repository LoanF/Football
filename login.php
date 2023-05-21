<?php
require("./class/GestionClub.php");
require("./class/GestionBDD.php");

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$c = new GestionClub($cnx);
?>

<link href="css/login.css" rel="stylesheet">

<div class="container w-75 mb-3">
    <h4>Connexion</h4>
<div class="border p-3">
<form action="post/envoieLog.php" method="post" class="form-register">
    <div class="mb-3">
        <label for="mail" class="form-label">Mail :</label><br>
        <input type="email" name="mail" class="form-control" placeholder="Saisissez un e-mail" required/>
    </div>
    <div class="mb-3">
        <label for="pswd" class="form-label">Mot de passe :</label><br>
        <input type="password" name="pswd" class="form-control" placeholder="Saisissez un mot de passe" required/>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Connexion</button>
        <button type="reset" class="btn btn-primary">Annuler</button>
    </div>
</form>
</div>
</div>