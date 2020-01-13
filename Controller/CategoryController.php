<?php

include "Model/CategoryModel.php";
include "View/CategoryView.php";

class CategoryController extends Controller{


    public function __construct()
    {
        $this->view = new CategoryView();
        $this->model = new CategoryModel();
    }

    /**
     * Construction de la page d'accueil
     *
     * @return void
     */
    public function start(){
        $listCategories = $this->model->getCategories();

        $this->view->displayHome($listCategories);
    }

    /**
     * Ajout dans la base de donnée
     *
     * @return void
     */
    public function addDB(){
        $this->model->addDB();
        header("location: index.php?controller=category");
    }

    /**
     * Supprimer dans la base de donnée
     *
     * @return void
     */

    public function deleteDB(){
        $this->model->deleteDB();
        header("location: index.php?controller=category");
    }

    /**
     * Modifier dans la base de donnée
     *
     * @return void
     */

    public function updateForm(){
        $new = $this->model->getCategory();
        $this->view->updateForm($new);
    }

    /**
     * Mise a jour de l'information dans la table
     *
     * @return void
     */
    public function updateDB(){
        $this->model->updateDB();
        header("location: index.php?controller=category");
    }
    
}
