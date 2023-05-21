<?php

require("../class/GestionBDD.php");
require("../class/GestionArticle.php");

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$a = new GestionArticle($cnx);

$a->removeArt($_GET['art']);

header("Location: ../index.php?page=admin");