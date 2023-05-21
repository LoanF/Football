<?php

require("../class/GestionBDD.php");
require("../class/GestionArticle.php");

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$a = new GestionArticle($cnx);

if (isset($_POST['auteur'])) {
    $param = 'pictures/'.$_FILES['picture']['name'];
    
    $tmpName = $_FILES['picture']['tmp_name'];
    $name = $_FILES['picture']['name'];
    $size = $_FILES['picture']['size'];
    $error = $_FILES['picture']['error'];
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
    
    $titre = $_POST['titre'];
    $desc = $_POST['desc'];
    $auteur = $_POST['auteur'];
    $photo = $param;
    
    $a->addArticle($titre, $desc, $auteur, $photo);
    
    header("Location: ../index.php?page=admin");
}