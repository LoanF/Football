<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of GestionClub
 *
 * @author UTI309
 */
require 'Club.php';

class GestionClub {
    
    private object $cnx;
    
    public function __construct(PDO $cnx) {
        $this->cnx = $cnx;
    }
    
    function getListClub(): array {
       $req="select * from club";
       $res = $this->cnx->query($req);
       $tabResultat = [];
       while ($club = $res->fetch()) {
           $tabResultat[] = new Club($club[0], $club[1], $club[2], $club[3], $club[4], $club[5], $club[6], $club[7]);
       }
       return $tabResultat;
    }
    
    function getNomClub(int $id): string {
        $req="select nom_club from club where id_club=".$id;
        $res = $this->cnx->query($req);
        $club = $res->fetch();
        return $club['nom_club']; 
    }
    
    function getInfoClub(int $id): Club {
        $req="select * from club where id_club=".$id;
        $res = $this->cnx->query($req);
        $row = $res->fetch();
        $club = new Club($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
        return $club; 
    }
    
    function getStade(int $id): string {
        $req="select * from stade where id_stade=".$id;
        $res = $this->cnx->query($req);
        $row = $res->fetch();
        return $row[1]; 
    }

}
