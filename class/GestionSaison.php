<?php

class GestionSaison {
    
    private object $cnx;
    
    public function __construct(PDO $cnx) {
        $this->cnx = $cnx;
    }
    
    function getSaison() {
       $req="select distinct annee from saison order by annee desc";
       $res = $this->cnx->query($req);
       return $res;
    }

}
