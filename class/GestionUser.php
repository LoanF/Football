<?php
require("User.php");
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of GestionUser
 *
 * @author UTI309
 */
class GestionUser {

    private object $cnx;

    public function __construct(PDO $cnx) {
        $this->cnx = $cnx;
    }

    function getListUser(): array {
        $req = "select * from utilisateur";
        $res = $this->cnx->query($req);
        $tabResultat = [];
        while ($user = $res->fetch()) {
            $tabResultat[] = new User($user[0], $user[1], $user[2], $user[3], $user[4], $user[5], $user[6], $user[7], $user[8], $user[9]);
        }
        return $tabResultat;
    }
    
    function checkUser(string $email): bool {
        $req = "select * from utilisateur WHERE mail_uti ='".$email."'";
        $res = $this->cnx->query($req);
        if ($res->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }
    
    function getUser(int $id): User {
        $req = "select * from utilisateur WHERE id_uti =".$id;
        $res = $this->cnx->query($req);
        while ($user = $res->fetch()) {
            $uti = new User($user[0], $user[1], $user[2], $user[3], $user[4], $user[5], $user[6], $user[7], $user[8], $user[9]);
        }
        return $uti;
    }
    
    function insertUser(int $id_club, string $nom_uti, string $prenom_uti, string $sexe_uti, string $password_uti, string $date_inscription = null, string $image_uti = null, string $mail_uti = null) {
        $req = "insert into utilisateur(id_club, nom_uti, prenom_uti, sexe_uti, password_uti, date_inscription, image_uti, mail_uti) VALUES(:club, :nom, :prenom, :sexe, :psw, :date, :image, :mail);";
        
        $res = $this->cnx->prepare($req);

        $res->bindParam(':club', $id_club);
        $res->bindParam(':nom', $nom_uti);
        $res->bindParam(':prenom', $prenom_uti);
        $res->bindParam(':sexe', $sexe_uti);
        $res->bindParam(':psw', $password_uti);
        $res->bindParam(':date', $date_inscription);
        $res->bindParam(':image', $image_uti);
        $res->bindParam(':mail', $mail_uti);

        try{
            $res->execute();
        }catch(PDOException $e){
            echo "".$e->getMessage();
        }
    }
    
    function editUser(int $id, int $id_club, string $nom_uti, string $prenom_uti, string $image_uti = null) {
        
        $req = "update utilisateur set id_club = :club, nom_uti = :nom, prenom_uti = :prenom, image_uti = :image where id_uti=".$id.";";
        
        $res = $this->cnx->prepare($req);

        $res->bindParam(':club', $id_club);
        $res->bindParam(':nom', $nom_uti);
        $res->bindParam(':prenom', $prenom_uti);
        $res->bindParam(':image', $image_uti);

        try{
            $res->execute();
        }catch(PDOException $e){
            echo "".$e->getMessage();
        }
    }

}
