<?php

namespace Models;

class User extends AbstractModel
{

    protected string $nomDeLaTable = 'users';

    protected $id;
    protected $username;
    protected $password;
    protected $display_name;
    protected $taille;
    protected $poids;
    protected $age;

    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    public function getDisplayName()
    {
        return $this->display_name;
    }
    public function setDisplayName($display_name)
    {
        $this->display_name = $display_name;
    }
    public function getTaille()
    {
        return $this->taille;
    }
    public function setTaille($taille)
    {
        $this->taille = $taille;
    }
    public function getPoids()
    {
        return $this->poids;
    }
    public function setPoids($poids)
    {
        $this->poids = $poids;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }

    public function save(User $user)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable}(username, password, display_name, taille, poids, age) VALUES (:username, :password, :display_name, :taille, :poids, :age)");

        $sql->execute([
            "username" => $user->username,
            "password" => $user->password,
            "display_name" => $user->display_name,
            "taille" => $user->taille,
            "poids" => $user->poids,
            "age" => $user->age
        ]);
    }

    public function findByUsername(string $username)
    {
        $sql = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable} where username = :username");
        $sql->execute([
            "username" => $username
        ]);
        $sql->setFetchMode(\PDO::FETCH_CLASS, get_class($this));
        return $sql->fetch();
    }

    /**
     * @param User $user
     * @param string $password
     * @return bool
     */
    public function logIn(string $password)
    {

        $result = false;

        if (password_verify($password, $this->password)) {

            $result = true;

            $_SESSION['user'] = [
                "id" => $this->id,
                "username" => $this->username,
                "displayName" => $this->display_name,
                "taille" => $this->taille,
                "poids" => $this->poids,
                "age" => $this->age,

            ];
        }

        return $result;
    }

    /**
     * @return void
     */
    public function logOut()
    {
        session_unset();
    }

    public static function getUser()
    {
        if (isset($_SESSION['user'])) {

            $userModel = new \Models\User();
            return $userModel->findById($_SESSION['user']['id']);
        } else {
            return false;
        }
    }
}
