<?php

$annee = $_POST['annee'];
$journee = $_POST['journee'];

$link = '../index.php?page=calendrier&annee='. $annee .'&journee='. $journee;

header("Location:". $link);