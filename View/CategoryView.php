<?php

class CategoryView extends View {

    /**
     * Ajout de la page d'accueil
     *
     * @param [type] $listNews
     * @return void
     */
    public function displayHome($listCategories){
        $this->page .= "<h2 class='mt-4 mb-4'>Liste des catégories</h2>";
        $this->page .= "<p><a href='index.php?controller=category&action=addForm'><button class='btn btn-primary'>Ajouter</button></a></p>";
        $this->page .= "<table class='table table-striped'>
        <thead class='thead-dark'>
          <tr>
            <th scope='col'>Nom</th>
            <th scope='col'>Description</th>
            <th scope='col' class='text-center'>Modifier</th>
            <th scope='col' class='text-center'>Supprimer</th>
          </tr>
        </thead>
        <tbody>";
        foreach($listCategories as $new){
            $this->page .= "<tr><th>"
            .$new["name"]."</th>"
            ."<td>".$new['description']."</td>"
            ."<td class='text-center'><a href='index.php?controller=category&action=updateForm&id="
            .$new['id']
            ."'class='btn btn-success'><i class='fas fa-pen'></i></a></td>"
            ."<td class='text-center'><a href='index.php?controller=category&action=deleteDB&id="
            .$new['id']
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
        $this->page .= file_get_contents("template/formCategory.html");
        $this->page = str_replace('{action}','addDB',$this->page);
        $this->page = str_replace('{id}','',$this->page);
        $this->page = str_replace('{name}','',$this->page);
        $this->page = str_replace('{description}','',$this->page); 
        $this->displayPage();
    }


    /**
     * Affichage du formulaire contenant l'information à modifier
     *
     * @param [type] $new
     * @return void
     */
    public function updateForm($new){
        $this->page .= "<h1>Modification de l'information</h1>";
        $this->page .= file_get_contents('template/formCategory.html');
        $this->page = str_replace('{action}','updateDB',$this->page);
        $this->page = str_replace('{id}',$new['id'],$this->page);
        $this->page = str_replace('{name}',$new['name'],$this->page);
        $this->page = str_replace('{description}',$new['description'],$this->page);
        $this->displayPage();
    }



}
