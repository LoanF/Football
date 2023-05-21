<?php
require("./class/GestionBDD.php");
require("./class/GestionArticle.php");
require("./class/GestionUser.php");

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$a = new GestionArticle($cnx);
$u = new GestionUser($cnx);
?>

<div class="d-flex mb-4">
    
    <?php
        $res = $a->getAnArticle($_GET['art']);
        while ($row = $res->fetch()) {
            echo "<img src=".$row['image_article']."/>";
            echo "<div class='container'>";
            echo "<div class='h3 text-primary m-3 text-uppercase'>".$row['titre_article']."</div>";
            echo "<div class='m-3'>".$row['desc_article']."</div>";
            echo "<div class='m-5 text-end'>".$row['auteur_article']."</div>";
            echo "</div>";
        }
    ?>
</div>

<?php

    $res = $a->getComments($_GET['art']);
    
    while ($row = $res->fetch()) {
        $user = $u->getUser($row['id_uti']);
        echo "<div class='container'>
            <div class='border border-3 border-secondary rounded mt-2 mb-2 w-100 p-3 bg-white d-flex'>
                <div class='d-flex align-items-center me-5 text-primary'>
                    <img src='".$user->getImage_uti()."' class='img_profil'/>
                    ".$user->getPrenom_uti()."
                </div>
                <div class='d-flex align-items-center'>
                    ".$row['str_commentaire']."
                </div>
            </div>
        </div>";
    }

?>
<form method="POST" action="post/envoieCom.php" id="sendComment" class="container mb-4">
    <HR/>
    <input type="hidden" name="article" value="<?php echo $_GET['art']; ?>"/>
    <textarea name="comment" class="border border-3 border-secondary rounded mt-1 w-100 p-3" placeholder="Ajouter un commentaire..." required></textarea>
    <button type="submit" class="btn btn-secondary">Publier mon commentaire</button>
</form>