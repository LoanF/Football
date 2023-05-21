<?php

require("../class/GestionBDD.php");
require("../class/GestionUser.php");

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$u = new GestionUser($cnx);

if (isset($_POST['pswd'])) {
    session_start();
    $stmt = $cnx->query("SELECT * FROM utilisateur WHERE mail_uti='".$_POST["mail"]."'");
    $row=$stmt->fetch();
    if (password_verify($_POST['pswd'], $row['password_uti'])) {
        $_SESSION["id"] = $row['id_uti'];
        $_SESSION["prenom"] = $row['prenom_uti'];
        $_SESSION["isAdmin"] = $row['admin_uti'];
    } else {
        echo 'erreur';
    }
}

header("Location: ../index.php");