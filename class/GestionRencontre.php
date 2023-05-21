<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of GestionRencontre
 *
 * @author loanf
 */
class GestionRencontre {
    
    private object $cnx;
    
    public function __construct(PDO $cnx) {
        $this->cnx = $cnx;
    }
    
    function getJournee() {
       $req="select distinct journee from rencontre order by journee";
       $res = $this->cnx->query($req);
       return $res;
    }
    
    function getRencontres(int $annee, int $journee) {
        $req="select * from get_matchs_journee(".$annee.", 1, ".$journee.")";
        $res = $this->cnx->query($req);
        return $res;
    }
    
}
