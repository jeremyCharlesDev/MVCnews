<?php

class UserModel extends Model{



    /**
     * Fonction affichage de la base de donnée
     *
     * @return void
     */
    public function getUsers(){
        $requete = "SELECT * FROM user";
        $result = $this->connexion->query($requete);
        $listUsers = $result->fetchAll(PDO::FETCH_ASSOC);
        return $listUsers;
    }
    /**
     * Inserer dans la base de donnée
     *
     * @return void
     */
    public function addDB(){
        // var_dump($_POST);
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $requete = $this->connexion->prepare("INSERT INTO user VALUES (NULL, :username, :password, :firstname, :lastname)");
        $requete->bindParam(':username' , $username);
        $requete->bindParam(':password' , $password);
        $requete->bindParam(':firstname' , $firstname);
        $requete->bindParam(':lastname' , $lastname);
        $result = $requete->execute();
    }

    /**
     * Suppression dans la base de donnée
     *
     * @return void
     */
    public function deleteDB(){

        $id = $_GET['id'];
        $requete = $this->connexion->prepare("DELETE FROM user WHERE id=:id");
        $requete->bindParam(':id' , $id);
        $result = $requete->execute();
        // var_dump($result);
    }

    /**
     * Récupération des informations dans la base de donnée
     *
     * @return void
     */
    public function getUser(){

        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT * FROM user WHERE id=:id");
        $requete->bindParam(':id' , $id);
        $result = $requete->execute();
        $user = $requete->fetch(PDO::FETCH_ASSOC);
        // var_dump($user);
        return $user;
    }

    /**
     * Mise a jour de la table
     *
     * @return void
     */
    public function updateDB(){

        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $requete = $this->connexion->prepare("UPDATE user 
                                            SET username = :username, password = :password, 
                                            firstname = :firstname, lastname = :lastname 
                                            WHERE id=:id");
        $requete->bindParam(':id' , $id);
        $requete->bindParam(':username' , $username);
        $requete->bindParam(':password' , $password);
        $requete->bindParam(':firstname' , $firstname);
        $requete->bindParam(':lastname' , $lastname);
        $result = $requete->execute();
        // var_dump($result);
        // var_dump($requete);
        // var_dump($requete->errorInfo());

    }
    
}
