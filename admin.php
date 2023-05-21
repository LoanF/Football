<?php

require("./class/GestionArticle.php");
require("./class/GestionBDD.php");

$bdd = new GestionBDD();
$cnx = $bdd->connect();
$a = new GestionArticle($cnx);

if (!$_SESSION["isAdmin"]) {
    header("Location: index.php?page=accueil");
} else {
    ?>
    
<div class="container w-50">
    <form action="post/envoieAdd.php" method="post" enctype="multipart/form-data">
        <div class="text-primary d-flex justify-content-center h4 m-3">Publier un article</div>
        <input name="titre" placeholder="Titre..." type="text" class="form-control m-1" required/>
        <textarea name="desc" placeholder="Description..." class="form-control m-1" required></textarea>
        <input name="picture" type="file" class="form-control m-1" required/>
        <input name="auteur" placeholder="Auteur..." type="text" class="form-control m-1" required/>
        <button class="btn btn-secondary m-1">Publier l'article</button>
    </form>
</div>

<HR class='w-50 container mt-4 mb-4'/>

<table class="table table-striped table-hover container w-50 border border-secondary text-center">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Gestion</th>
        </tr>
    </thead>
    <tbody>
    <?php
    
    $res = $a->getArticles();
    
    while($row = $res->fetch()) {
        ?>
        <tr>
            <th scope="row"><?php echo $row['id_article']; ?></th>
            <td><?php echo $row['titre_article']; ?></td>
            <td><a href="post/deleteArt.php?art=<?php echo $row['id_article']; ?>"><i class="fa-solid fa-trash" style="color:brown;"></i></a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<?php
}
