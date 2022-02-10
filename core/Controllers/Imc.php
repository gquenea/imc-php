<?php

namespace Controllers;

class Imc extends AbstractController
{
    protected $defaultModelName = \Models\Imc::class;

    public function index() {

        return $this->render("imc/index", [
            "pageTitle" => "Tous les imc",
            "imc" => $this->defaultModel->findAll()
        ]);
    }


    public function create() {

        $taille = null;
        $poids = null;

        if (!empty($_POST['taille']) && !empty($_POST['poids']) && 
             ctype_digit($_POST['taille']) && ctype_digit($_POST['poids'])) {

            $taille = $_POST['taille'];
            $poids = $_POST['poids'];

        }

        if ($taille && $poids) {

            $resultat = $poids / ($taille / 100) **2;
            $resultat = round($resultat, 2);
            
            $imc = new \Models\Imc();
            $imc->setTaille($taille);
            $imc->setPoids($poids);
            $imc->setResultat($resultat);
            $imc->setUserId($_SESSION['user']['id']);

            $this->defaultModel->save($imc);

            return $this->redirect(["type" => "imc",
                                    "action" => "index",
        ]);


        }

        return $this->render("imc/create", ["pageTitle" => "Calcul de votre IMC"]);
    }


}