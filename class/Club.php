<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Club
 *
 * @author UTI309
 */
class Club {
    private int $id_club;
    private string $nom_club;
    private ?int $id_stade;
    private string $ville_club;
    private string $logo_club;
    private ?int $annee_fondation;
    private ?string $president;
    private ?string $entraineur;

    public function __construct(int $id_club, string $nom_club, ?int $id_stade, string $ville_club, string $logo_club, ?int $annee, string $president = null, string $entraineur = null) {
        $this->id_club = $id_club;
        $this->nom_club = $nom_club;
        $this->id_stade = $id_stade;
        $this->ville_club = $ville_club;
        $this->logo_club = $logo_club;
        $this->annee_fondation = $annee;
        $this->president = $president;
        $this->entraineur = $entraineur;
    }
    public function getId_club(): int {
        return $this->id_club;
    }

    public function getNom_club(): string {
        return $this->nom_club;
    }

    public function getVille_club(): string {
        return $this->ville_club;
    }
    
    public function getId_stade(): int {
        return $this->id_stade;
    }

    public function setId_club(int $id_club): void {
        $this->id_club = $id_club;
    }

    public function setNom_club(string $nom_club): void {
        $this->nom_club = $nom_club;
    }

    public function setVille_club(string $ville_club): void {
        $this->ville_club = $ville_club;
    }

    public function setId_stade(int $id_stade): void {
        $this->id_stade = $id_stade;
    }
    
    public function getLogo_club(): string {
        return $this->logo_club;
    }

    public function getAnnee_fondation(): ?int {
        return $this->annee_fondation;
    }

    public function getPresident(): ?string {
        return $this->president;
    }

    public function getEntraineur(): ?string {
        return $this->entraineur;
    }

    public function setLogo_club(string $logo_club): void {
        $this->logo_club = $logo_club;
    }

    public function setAnnee_fondation(?int $annee_fondation): void {
        $this->annee_fondation = $annee_fondation;
    }

    public function setPresident(?string $president): void {
        $this->president = $president;
    }

    public function setEntraineur(?string $entraineur): void {
        $this->entraineur = $entraineur;
    }

}
