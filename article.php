<?php
require("./class/GestionBDD.php");
require("./class/GestionArticle.php");

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$a = new GestionArticle($cnx);
?>

<div class="container">
    <div class="text-primary m-4 h4 text-center">ARTICLES</div>
    <div class="d-flex flex-wrap justify-content-around">
    <?php
    $res = $a->getArticles();
    while($row = $res->fetch()) {
        ?>
        <a class="text-decoration-none" href="index.php?page=artpage&art=<?php echo $row['id_article']; ?>">
            <div class="m-3" style="box-shadow: 3px 3px 0 0 #cdfb0a;height:325px;width:250px;background-size:100% 100%;background-image: url(<?php echo $row['image_article']; ?>);">
                <div class="text-white h-100 bg-black bg-opacity-50 text-uppercase d-flex align-items-end" style="letter-spacing: -1px;"><div class="p-3 mx-auto h6"><?php echo $row['titre_article']; ?></div></div>
            </div>
        </a>
        <?php
    }
    ?>
    </div>
</div>