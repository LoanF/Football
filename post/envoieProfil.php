<?php

session_start();

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
        $param = $u->getUser($_SESSION['id'])->getImage_uti();
    }
    
    $id_club = $_POST['equipe'];
    $nom_uti = $_POST['nom'];
    $prenom_uti = $_POST['prenom'];
    $image_uti = $param;
    
    $u->editUser($_SESSION['id'], $id_club, $nom_uti, $prenom_uti, $image_uti);
    
    header("Location: ../index.php?page=profil");
} else {
    echo 'erreur';
}