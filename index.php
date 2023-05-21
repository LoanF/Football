<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html lang="fr_FR">
    <head>
        <meta charset="UTF-8">
        <title>Ligue 1</title>
        <link rel="icon" href="ligue.ico" />
        <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://kit.fontawesome.com/f98f7366b1.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;700&family=Yaldevi:wght@600&display=swap" rel="stylesheet">
    </head>
    <body class="bg-body">
        <?php session_start(); ?>
        <style>
            body {
                font-family: 'Rubik', sans-serif;
                font-family: 'Yaldevi', sans-serif;
            }
        </style>
        <header class="p-3 bg-primary">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <div class="m-1"><img style="background-color: #091c3e" src="logo.svg" height="32" width="32" /></div> 
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="index.php?page=accueil" class="nav-link px-2 text-white">Accueil</a></li>
                        <li><a href="index.php?page=calendrier&annee=2023&journee=1" class="nav-link px-2 text-white">Calendrier</a></li>
                        <li><a href="index.php?page=classement&annee=2023" class="nav-link px-2 text-white">Classement</a></li>
                        <li><a href="index.php?page=article" class="nav-link px-2 text-white">Articles</a></li>
                    </ul>
                    <div class="text-end">
                    <?php
                    if (!isset($_SESSION["id"])) { ?>
                        <button type="button" class="btn btn-outline-light me-2" onclick="window.location.href = 'index.php?page=register';">Inscription</a</button>
                        <button type="button" class="btn btn-warning" onclick="window.location.href = 'index.php?page=login';">Connexion</button>
                    <?php
                    } else { 
                        if ($_SESSION["isAdmin"]) {
                            ?><button type="button" class="btn btn-outline-light me-2" onclick="window.location.href = 'index.php?page=admin';">Administration</button><?php
                        }
                        ?>
                        <button type="button" class="btn btn-outline-light me-2" onclick="window.location.href = 'index.php?page=profil';">Profil</button>
                        <button type="button" class="btn btn-warning" onclick="window.location.href = 'logout.php';">Déconnexion</button>
                    <?php
                    } ?>
                    </div>
                </div>
            </div>
        </header>
        
        <?php
        
        if(isset($_GET['page'])) {
            $nav = $_GET['page'];
            
            if ($nav == "accueil") {
                include 'accueil.php';
            }
            elseif ($nav == "calendrier") {
                include 'calendrier.php';
            }
            elseif ($nav == "classement") {
                include 'classement.php';
            }
            elseif ($nav == "article") {
                include 'article.php';
            }
            elseif ($nav == "register") {
                echo "<br><br>";
                include 'register.php';
            }
            elseif ($nav == "login") {
                echo "<br><br>";
                include 'login.php';
            }
            elseif ($nav == "profil") {
                include 'profil.php';
            }
            elseif ($nav == "artpage") {
                include 'articlepage.php';
            }
            elseif ($nav == "editprofil") {
                echo "<br><br>";
                include 'editprofil.php';
            }
            elseif ($nav == "infoclub") {
                include 'infoclub.php';
            }
            elseif ($nav == "admin") {
                include 'admin.php';
            }
        } else {
            include 'accueil.php';
        }
        ?>
    </body>
</html>
