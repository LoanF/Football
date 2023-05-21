<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of GestionClassement
 *
 * @author loanf
 */
class GestionArticle {
    private object $cnx;
    
    public function __construct(PDO $cnx) {
        $this->cnx = $cnx;
    }
    
    public function getArticles() {
        $req="select * from article";
        $res = $this->cnx->query($req);
        return $res;
    }
    
    public function getAnArticle(int $id) {
        $req="select * from article where id_article=".$id;
        $res = $this->cnx->query($req);
        return $res;
    }
    
    public function getComments(int $id) {
        $req="select * from commentaire where id_article=".$id;
        $res = $this->cnx->query($req);
        return $res;
    }
    
    public function sendComment(int $id_uti, int $id_art, string $comment) {
        $req="INSERT INTO commentaire(id_uti, id_article, str_commentaire) VALUES(:uti, :art, :comment);";
        
        $res = $this->cnx->prepare($req);
        
        $res->bindParam(':uti', $id_uti);
        $res->bindParam(':art', $id_art);
        $res->bindParam(':comment', $comment);
        
        try{
            $res->execute();
        }catch(PDOException $e){
            echo "".$e->getMessage();
        }
    }
    
    public function addArticle(string $titre, string $desc, string $auteur, string $picture) {
        $req="INSERT INTO article(titre_article, desc_article, auteur_article, image_article) VALUES(:titre, :desc, :auteur, :image);";
        
        $res = $this->cnx->prepare($req);
        
        $res->bindParam(':titre', $titre);
        $res->bindParam(':desc', $desc);
        $res->bindParam(':auteur', $auteur);
        $res->bindParam(':image', $picture);
        
        try{
            $res->execute();
        }catch(PDOException $e){
            echo "".$e->getMessage();
        }
    }
    
    public function removeArt(int $id) {
        $req="DELETE FROM commentaire WHERE id_article=".$id;
        $this->cnx->exec($req);
        
        $req="DELETE FROM article WHERE id_article=".$id;
        $this->cnx->exec($req);
    }
}