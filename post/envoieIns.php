<?php

require("../class/GestionBDD.php");
require("../class/GestionUser.php");

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$u = new GestionUser($cnx);

if (isset($_POST['nom']))
{
    $param = 'pictures/'.$_FILES['photo']['name'];
    
    $tmpName = $_FILES['photo']['tmp_name'];
    $name = $_FILES['photo']['name'];
    $size = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));
    $extensions = ['png', 'jpg'];
    if(in_array($extension, $extensions)){
        move_uploaded_file($tmpName, '../pictures/'.$name);
    }
    else{
        echo "Mauvaise extension";
        $param = 'pictures/profil.jpg';
    }
    
    $id_club = $_POST['equipe'];
    $nom_uti = $_POST['nom'];
    $prenom_uti = $_POST['prenom'];
    $sexe_uti = $_POST['sexe'];
    $hash = password_hash($_POST['pswd'], PASSWORD_DEFAULT);
    $date_inscription = date('Y-m-d H:i:s');
    $image_uti = $param;
    $mail_uti = $_POST['mail'];
    
    if ($u->checkUser($mail_uti)) {
        $u->insertUser($id_club, $nom_uti, $prenom_uti, $sexe_uti, $hash, $date_inscription, $image_uti, $mail_uti);
    }
    
    header("Location: ../index.php?page=login");
} else {
    echo 'erreur';
}