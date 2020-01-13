<?php

class CategoryModel extends Model{



    /**
     * Inserer dans la base de donnée
     *
     * @return void
     */
    public function addDB(){
        // var_dump($_POST);
        $name = $_POST['name'];
        $description = $_POST['description'];

        $requete = $this->connexion->prepare("INSERT INTO category VALUES (NULL, :name, :description)");
        $requete->bindParam(':name' , $name);
        $requete->bindParam(':description' , $description);
        $result = $requete->execute();
    }

    /**
     * Suppression dans la base de donnée
     *
     * @return void
     */
    public function deleteDB(){

        $id = $_GET['id'];
        $requete = $this->connexion->prepare("DELETE FROM category WHERE id=:id");
        $requete->bindParam(':id' , $id);
        $result = $requete->execute();
        // var_dump($result);
    }

    /**
     * Récupération des informations dans la base de donnée
     *
     * @return void
     */
    public function getCategory(){

        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT * FROM category WHERE id=:id");
        $requete->bindParam(':id' , $id);
        $result = $requete->execute();
        $new = $requete->fetch(PDO::FETCH_ASSOC);

        // var_dump($new);
        return $new;
    }

    /**
     * Mise a jour de la table
     *
     * @return void
     */
    public function updateDB(){

        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $requete = $this->connexion->prepare("UPDATE category SET name = :name, description = :description WHERE id=:id");
        $requete->bindParam(':id' , $id);
        $requete->bindParam(':name' , $name);
        $requete->bindParam(':description' , $description);
        $result = $requete->execute();
        // var_dump($result);
        // var_dump($requete);
        // var_dump($requete->errorInfo());

    }
    
}
