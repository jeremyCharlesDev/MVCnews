<?php

class Model {

    // déclaration en local
    const SERVER = "localhost";
    const USER = "root";
    const PASSWORD = "root";
    const BASE = "news";


    // déclaration à distance
    // const SERVER = "sqlprive-pc2372-001.privatesql.ha.ovh.net";
    // const USER = "cefiidev943";
    // const PASSWORD = "hz55d4VD";
    // const BASE = "cefiidev943";


    protected $connexion;

    /**
     * Connexion a la base de donnée
     */
    public function __construct()
    {
        // connexion
        try
        {
            $this->connexion=new PDO("mysql:host=". self::SERVER.";dbname=". self::BASE, self::USER, self::PASSWORD);
            $this->connexion->exec("SET NAMES 'UTF8'");
        }
        catch(Exception $e)
        {
            echo'Erreur : '.$e->getMessage();
        }
    }

    /**
     * Fonction affichage de la base de donnée
     *
     * @return void
     */
    public function getCategories(){
        $requete = "SELECT * FROM category";
        $result = $this->connexion->query($requete);
        $listCategories = $result->fetchAll(PDO::FETCH_ASSOC);
        return $listCategories;
    }
    
}
