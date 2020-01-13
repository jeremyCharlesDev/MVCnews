<?php

include "Model/SecurityModel.php";
include "View/SecurityView.php";

class SecurityController extends Controller{


    public function __construct()
    {
        $this->view = new SecurityView();
        $this->model = new SecurityModel();
    }

    
    /**
     * Afficher le formulaire de login
     *
     * @return void
     */
    public function formLogin()
    {
        $this->view->addForm();
    }

    /**
     * Test d'authentification au login
     *
     * @return void
     */
    public function login()
    {
        $user = $this->model->testLogin();
        if ($user != false) {
            header("location: index.php?controller=new");
        } else {
            header("location: index.php?controller=security&action=formLogin");
        }
    }

    public function logout()
    {
        $this->model->logout();
        header("location: index.php?controller=new");
    }


    
}
