<?php

namespace Controllers;

class User extends AbstractController
{


    protected $defaultModelName = \Models\User::class;


    public function signUp()
    {

        $username = null;
        $password = null;
        $display_name = null;
        $taille = null;
        $poids = null;
        $age = null;


        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['display_name']) && !empty($_POST['taille']) && !empty($_POST['poids']) && !empty($_POST['age']) && ctype_digit($_POST['taille']) && ctype_digit($_POST['poids']) && ctype_digit($_POST['age'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $display_name = htmlspecialchars($_POST['display_name']);
            $taille = ($_POST['taille']);
            $poids = ($_POST['poids']);
            $age = ($_POST['age']);
        }

        if ($username && $password && $display_name && $taille && $poids && $age) {


            if ($this->defaultModel->findByUsername($username)) {
                $this->redirect([
                    "type" => "user",
                    "action" => "signup",
                    "info" => "Désolé, username déja pris"
                ]);
            };


            $user = new \Models\User();

            $user->setUsername($username);
            $user->setPassword($password);
            $user->setDisplayName($display_name);
            $user->setTaille($taille);
            $user->setPoids($poids);
            $user->setAge($age);


            $this->defaultModel->save($user);

            return $this->redirect([
                "type" => "home",
                "action" => "index"
            ]);
        }
        return $this->render("users/register", ["pageTitle" => "Création de compte"]);
    }

    public function signIn()
    {

        $username = null;
        $password = null;

        if (!empty($_POST['username'])) {
            $username = htmlspecialchars($_POST['username']);
        }
        if (!empty($_POST['password'])) {
            $password = htmlspecialchars($_POST['password']);
        }


        if ($username && $password) {

            $userLoggingIn = $this->defaultModel->findByUsername($username);

            if (!$userLoggingIn) {


                return $this->redirect([
                    "type" => "home",
                    "action" => "index",
                    "info" => "déso {$username} je ne te connais pas"
                ]);
            }

            if (!$userLoggingIn->logIn($password)) {
                return $this->redirect([
                    "type" => "home",
                    "action" => "index",
                    "info" => "déso {$username} mauvais mot de passe"
                ]);;
            }
            return $this->redirect([
                "type" => "home",
                "action" => "index",
                "info" => "Bienvenue {$userLoggingIn->getDisplayName()}"
            ]);
        }



        return $this->render("users/signin", ["pageTitle" => "Connexion"]);
    }

    /**
     * 
     * @return void
     */
    public function signOut()
    {
        $this->defaultModel->logOut();
        return $this->redirect([
            "type" => "home",
            "action" => 'index',
            "info" => "Vous êtes déconnecté"
        ]);
    }
}
