<?php

class UserView extends View {

    /**
     * Ajout de la page d'accueil
     *
     * @param [type] $listNews
     * @return void
     */
    public function displayHome($listUsers){
        $this->page .= "<h2 class='mt-4 mb-4'>Liste des utilisateurs</h2>";
        $this->page .= "<p><a href='index.php?controller=user&action=addForm'><button class='btn btn-primary'>Ajouter</button></a></p>";
        $this->page .= "<table class='table table-striped'>
        <thead class='thead-dark'>
          <tr>
            <th scope='col'>Nom d'utilisateurs</th>
            <th scope='col'>Mot de passe</th>
            <th scope='col'>Prénom</th>
            <th scope='col'>Nom</th>
            <th scope='col' class='text-center'>Modifier</th>
            <th scope='col' class='text-center'>Supprimer</th>
          </tr>
        </thead>
        <tbody>";
        foreach($listUsers as $user){
            $this->page .= "<tr><th>"
            .$user["username"]."</th>"
            ."<td>".$user['password']."</td>"
            ."<td>".$user['firstname']."</td>"
            ."<td>".$user['lastname']."</td>"
            ."<td class='text-center'><a href='index.php?controller=user&action=updateForm&id="
            .$user['id']
            ."'class='btn btn-success'><i class='fas fa-pen'></i></a></td>"
            ."<td class='text-center'><a href='index.php?controller=user&action=deleteDB&id="
            .$user['id']
            ."' class='btn btn-danger'><i class='fas fa-trash'></i></a></td></tr>";
        }
        $this->page .= "</tbody></table>";
        $this->displayPage();
    }

    /**
     * Ajout d'un formulaire de saisie d'une nouvelle info
     *
     * @param [type] $listNews
     * @return void
     */

    public function addForm(){
        $this->page .= file_get_contents("template/formUser.html");
        $this->page = str_replace('{action}','addDB',$this->page);
        $this->page = str_replace('{id}','',$this->page);
        $this->page = str_replace('{username}','',$this->page);
        $this->page = str_replace('{password}','',$this->page); 
        $this->page = str_replace('{firstname}','',$this->page); 
        $this->page = str_replace('{lastname}','',$this->page); 
        $this->displayPage();
    }


    /**
     * Affichage du formulaire contenant l'information à modifier
     *
     * @param [type] $new
     * @return void
     */
    public function updateForm($user){
        $this->page .= "<h1>Modification de l'utilisateur</h1>";
        $this->page .= file_get_contents('template/formUser.html');
        $this->page = str_replace('{action}','updateDB',$this->page);
        $this->page = str_replace('{id}',$user['id'],$this->page);
        $this->page = str_replace('{username}',$user['username'],$this->page);
        $this->page = str_replace('{password}',$user['password'],$this->page);
        $this->page = str_replace('{firstname}',$user['firstname'],$this->page);
        $this->page = str_replace('{lastname}',$user['lastname'],$this->page);
        $this->displayPage();
    }



}
