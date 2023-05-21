<?php

$annee = $_POST['annee'];

$link = '../index.php?page=classement&annee='. $annee;

header("Location:". $link);