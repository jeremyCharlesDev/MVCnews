<?php

abstract class View {

    protected $page;

    /**
     * Ajout de l'entête de la page
     *
     * @param [type] $listNews
     * @return void
     */
    public function __construct()
    {
        $this->page = file_get_contents("template/head.html");
        $this->page .= file_get_contents("template/nav.html");
        
        //Si l'utilisateur est connecté j'affiche les menus sinon je les cache
        if (isset($_SESSION['user'])) {
            $buttonAjout = '<p><a href="index.php?controller=user&action=addForm"><button class="btn btn-primary">Ajouter</button></a></p>';
            $optionCat = '<a class="nav-link {active_cat}" href="index.php?controller=category">Catégories</a>';
            $optionUser = '<a class="nav-link {active_user}" href="index.php?controller=user">Utilisateur</a>';
            $optionConnect = '<a class="ml-auto {active_security}" href="index.php?controller=security&action=logout"><button class="btn-outline-secondary btn-sm">Déconnexion</button></a>';
        } else {
            $buttonAjout = '';
            $optionCat = '';
            $optionUser = '';
            $optionConnect = '<a class=" {active_security}" href="index.php?controller=security&action=formLogin"><button class="btn btn-info">Connexion</button></a>';
        }
        $this->page = str_replace('{buttonAjout}',$buttonAjout,$this->page);
        $this->page = str_replace('{category}',$optionCat,$this->page);
        $this->page = str_replace('{user}',$optionUser,$this->page);
        $this->page = str_replace('{optionConnect}',$optionConnect,$this->page);


        //Lien actif et title qui change        
        if (!isset($_GET['controller'])) {
            $_GET['controller'] = "new";
            $this->page = str_replace('{active_new}','active',$this->page);
        }
        if ($_GET['controller'] == 'new') {
            $this->page = str_replace('{active_new}','active',$this->page);
            $this->page = str_replace('{title}','Actualités',$this->page);
        }
        if ($_GET['controller'] == 'category') {
            $this->page = str_replace('{active_cat}','active',$this->page);
            $this->page = str_replace('{title}','Catégories',$this->page);
        } 
        if ($_GET['controller'] == 'user') {
            $this->page = str_replace('{active_user}','active',$this->page);
            $this->page = str_replace('{title}','Utilisateur',$this->page);
        } 
        if ($_GET['controller'] == 'security') {
            $this->page = str_replace('{active_security}','active',$this->page);
            $this->page = str_replace('{title}','Connexion',$this->page);
        } 
    }

    /**
     * Affichage de l'attribut page
     *
     * @return void
     */
    protected function displayPage(){
        $this->page .= file_get_contents("template/footer.html");
        echo $this->page;
    }




}
