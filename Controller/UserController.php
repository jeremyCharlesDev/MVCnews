<?php

include "Model/UserModel.php";
include "View/UserView.php";

class UserController extends Controller{


    public function __construct()
    {
        $this->view = new UserView();
        $this->model = new UserModel();
    }

    /**
     * Construction de la page d'accueil
     *
     * @return void
     */
    public function start(){
        $listUsers = $this->model->getUsers();

        $this->view->displayHome($listUsers);
    }

    /**
     * Ajout dans la base de donnée
     *
     * @return void
     */
    public function addDB(){
        $this->model->addDB();
        header("location: index.php?controller=user");
    }

    /**
     * Supprimer dans la base de donnée
     *
     * @return void
     */

    public function deleteDB(){
        $this->model->deleteDB();
        header("location: index.php?controller=user");
    }

    /**
     * Modifier dans la base de donnée
     *
     * @return void
     */

    public function updateForm(){
        $user = $this->model->getUser();
        $this->view->updateForm($user);
    }

    /**
     * Mise a jour de l'information dans la table
     *
     * @return void
     */
    public function updateDB(){
        $this->model->updateDB();
        header("location: index.php?controller=user");
    }
    
}
