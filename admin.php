<?php

if (!$_SESSION["isAdmin"]) {
    header("Location: index.php?page=accueil");
} else {
    echo 'Bonjour !';
}
