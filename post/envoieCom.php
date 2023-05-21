<?php

session_start();

$id = $_SESSION['id'];
$art = $_POST['article'];
$com = $_POST['comment'];

require("../class/GestionBDD.php");
require("../class/GestionArticle.php");

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$a = new GestionArticle($cnx);

$a->sendComment($id, $art, $com);

header("Location: ../index.php?page=artpage&art=".$art);