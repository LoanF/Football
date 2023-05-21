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
class GestionClassement {
    private object $cnx;
    
    public function __construct(PDO $cnx) {
        $this->cnx = $cnx;
    }
    
    public function getClassement(int $annee, int $ligue) {
        $req="select * from classement_saison(".$annee.",".$ligue.") ORDER BY nb_points DESC";
        $res = $this->cnx->query($req);
        return $res;
    }
}
