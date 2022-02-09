<?php

namespace Models;

class Imc extends AbstractModel
{
    protected string $nomDeLaTable = "imc";

    private $imcId;
    private $display_name;
    private $taille;
    private $poids;
    private $user_id;
    private $resultat;


    public function getImcId() {

        return $this->imcId;
    }

    public function getDisplayName() {

        return $this->display_name;
    }

    public function setDisplayName($display_name) {

        $this->display_name = $display_name;
    }

    public function getTaille() {

        return $this->taille;
    }

    public function setTaille($taille) {

        $this->taille = $taille;
    }


    public function getPoids() {

        return $this->poids;
    }

    public function setPoids($poids) {

        $this->poids = $poids;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getResultat() {

        return $this->resultat;
    }

    public function setResultat($resultat){

        $this->resultat = $resultat;
    }

    
    public function save(Imc $imc) {


       $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} (taille, poids, resultat, user_id) VALUES (:taille, :poids,   :resultat, :user_id)");


        $sql->execute([

            "poids" =>$imc->poids,
            "taille" =>$imc->taille,
            "resultat" =>$imc->resultat,
            "user_id" =>$imc->getUserId()

    ]);
    }

    

}