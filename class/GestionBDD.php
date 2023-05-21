<?php

/*
Class Gestion BDD dans GestionBDD.php
 */

class GestionBDD {

    private string $user;
    private string $pass;
    private string $dsn;
    private string $db;

    private PDO $cnx;
    
    function __construct(string $db = 'francoisloan_ligue', string $user = 'francoisloan_admin', string $pass = 'L1gu3S10') {
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->dsn = 'pgsql:host=postgresql-francoisloan.alwaysdata.net;port=5432;dbname=' . $db . ';';
        //46.18.230.10 -> distance
        //192.168.30.110 -> local
    }
    public function getUser(): string    {
        return $this->user;
    }

        /**
     * @return PDO
     */
    function connect():PDO{
        try {
            $this->cnx = new PDO($this->dsn, $this->user, $this->pass);
            return $this->cnx;
        } catch (PDOException $e) {
            print "Erreur de connexion à la base !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}