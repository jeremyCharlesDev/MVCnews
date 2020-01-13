<?php

// SELECT news.*, 
// category.id as id_category,
// category.name as name_category,
// category.description as description_category
// FROM news
// JOIN category
// ON news.category = category.id


class NewModel extends Model {

    /**
     * Fonction affichage de la base de donnée
     *
     * @return void
     */
    public function getNews(){
        $requete = "SELECT news.*, 
        category.id as id_category,
        category.name as name_category,
        category.description as description_category
        FROM news
        LEFT JOIN category
        ON news.category = category.id";
        $result = $this->connexion->query($requete);
        $listNews = $result->fetchAll(PDO::FETCH_ASSOC);
        return $listNews;
    }


    /**
     * Inserer dans la base de donnée
     *
     * @return void
     */
    public function addDB(){
        // var_dump($_POST);
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['categories'];
        // $photo = $_POST['photo'];
        $photo = "undefined.jpg";

        if (isset($_FILES['photo']) && !empty($_FILES['photo'])) {
            $emplacement_temporaire = $_FILES['photo']['tmp_name'];
            $nom_fichier = $_FILES['photo']['name'];
            $emplacement_destination = "template/img/". $nom_fichier;
            
            $result = move_uploaded_file($emplacement_temporaire, $emplacement_destination);
            if ($result){
                $photo = $nom_fichier;
            }
        }

        $requete = $this->connexion->prepare("INSERT INTO news VALUES (NULL, :title, :description, :photo, :category)");
        $requete->bindParam(':title' , $title);
        $requete->bindParam(':description' , $description);
        $requete->bindParam(':category' , $category);
        $requete->bindParam(':photo' , $photo);
        $result = $requete->execute();
    }

    /**
     * Suppression dans la base de donnée
     *
     * @return void
     */
    public function deleteDB(){

        $id = $_GET['id'];
        $requete = $this->connexion->prepare("DELETE FROM news WHERE id=:id");
        $requete->bindParam(':id' , $id);
        $result = $requete->execute();
        // var_dump($result);
    }

    /**
     * Récupération des informations dans la base de donnée
     *
     * @return void
     */
    public function getNew(){
        // SELECT * FROM news WHERE id=:id
        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT news.*, 
        category.id as id_category,
        category.name as name_category,
        category.description as description_category
        FROM news
        LEFT JOIN category
        ON news.category = category.id
        WHERE news.id=:id");
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
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        
        if (empty($category)){
            $category=NULL;
        }

        if (isset($_FILES['photo']) && ($_FILES['photo']['size']>0)) {
            $photo = "undefined.jpg";
            $emplacement_temporaire = $_FILES['photo']['tmp_name'];
            $nom_fichier = $_FILES['photo']['name'];
            $emplacement_destination = "template/img/". $nom_fichier;
            // var_dump($emplacement_temporaire);
            // var_dump($emplacement_destination);		
            $result = move_uploaded_file($emplacement_temporaire, $emplacement_destination);
        
            if ($result){
                $photo = $nom_fichier;
            }
            $requete = $this->connexion->prepare("UPDATE news 
            SET title = :title, description = :description, photo = :photo, category = :category WHERE id=:id");
                $requete->bindParam(':photo', $photo);
            } else {
                $requete = $this->connexion->prepare("UPDATE news 
                SET title = :title, description = :description, category = :category WHERE id=:id");
            }

        $requete->bindParam(':id' , $id);
        $requete->bindParam(':title' , $title);
        $requete->bindParam(':description' , $description);
        $requete->bindParam(':category' , $category);
        $result = $requete->execute();
        // var_dump($result);
        // var_dump($requete);
        // var_dump($requete->errorInfo());

    }


    
}
