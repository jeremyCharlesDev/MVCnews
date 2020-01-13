<?php

include "Model/NewModel.php";
include "View/NewView.php";

class NewController extends Controller{


    public function __construct()
    {
        $this->view = new NewView();
        $this->model = new NewModel();
    }

    /**
     * Construction de la page d'accueil
     *
     * @return void
     */
    public function start(){
        $listNews = $this->model->getNews();
        // var_dump($listNews);

        $this->view->displayHome($listNews);
    }

    /**
     * Ajout dans la base de donnée
     *
     * @return void
     */
    public function addDB(){
        $this->model->addDB();
        // $this->start();
        header("location: index.php?controller=new");
    }

    /**
     * Supprimer dans la base de donnée
     *
     * @return void
     */

    public function deleteDB(){
        $this->model->deleteDB();
        header("location: index.php?controller=new");
    }

    /**
     * Modifier dans la base de donnée
     *
     * @return void
     */

    public function updateForm(){
        $listCategories = $this->model->getCategories();
        $new = $this->model->getNew();
        $this->view->updateForm($new, $listCategories);
    }

    /**
     * Mise a jour de l'information dans la table
     *
     * @return void
     */
    public function updateDB(){
        $this->model->updateDB();
        header("location: index.php?controller=new");
    }

     /**
     * Gestion de l'affichage du formulaire d'ajout
     *
     * @return void
     */
    public function addForm(){
        $listCategories = $this->model->getCategories();
        $this->view->addForm($listCategories);
    }

     /**
     * Affichage de la page article
     *
     * @return void
     */
    public function modal(){
        $new = $this->model->getNew();
        $this->view->modal($new);
    }
    
}
