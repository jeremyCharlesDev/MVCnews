<?php

class NewView extends View {

    /**
     * Ajout de la page d'accueil
     *
     * @param [type] $listNews
     * @return void
     */
    public function displayHome($listNews){
        $this->page .= "<h2 class='mt-4 mb-3 ml-3'>Toute l'actualité sur le blog News</h2>
        <div class='d-flex align-items-end mb-4'>";
        foreach($listNews as $cat){
            $this->page .= "<a href='#'><button class='btn btn-dark btn-sm ml-3'>".$cat["name_category"]."</button></a>";
        }
        if (isset($_SESSION['user'])) {
            $this->page .= "<a class='ml-auto mr-3' href='index.php?controller=new&action=addForm'><button class='btn btn-primary'>Ajouter</button></a>";
        }
        
        $this->page .= '</div>';
        $this->page .= '<section id="sectionHome">';
        foreach($listNews as $new){
            $this->page .='<article class="col-md-4 col-sm-12 d-inline-flex mb-4 align-items-baseline"><div class="card home mx-auto";">
                            <a href="index.php?controller=new&action=modal&id='.$new['id'].'">
                                <div class="cardHome">
                                    <img src=template/img/'.$new['photo'].' class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                <h5 class="card-title">'.$new["title"].'</h5>
                                <p class="card-text">'.mb_strimwidth($new['description'], 0, 70, "[...]").'</p></a>
                                <div class="d-flex align-items-end mt-3"><button class="btn btn-dark btn-sm">'.$new["name_category"].'</button>
                                <div class="ml-auto text-right">';
                                if (isset($_SESSION['user'])) {
                                    $this->page .= "<a href='index.php?controller=new&action=updateForm&id="
                                    .$new['id']
                                    ."'class='btn btn-success ml-5'><i class='fas fa-pen'></i></a>";
                                    $this->page .= "<a href='index.php?controller=new&action=deleteDB&id="
                                    .$new['id']
                                    ."' class='btn btn-danger ml-2'><i class='fas fa-trash'></i></a>";
                                }
                                $this->page .= '</div></div></div>
                                
                            </div></article>';
            }
            $this->page .= '</section>';

        $this->displayPage();
    }

    /**
     * Ajout d'un formulaire de saisie d'une nouvelle info
     *
     * @param [type] $listNews
     * @return void
     */

    public function addForm($listCategories){
        $this->page .= file_get_contents("template/formNew.html");
        $this->page = str_replace('{action}','addDB',$this->page);
        $this->page = str_replace('{id}','',$this->page);
        $this->page = str_replace('{title}','',$this->page);
        $this->page = str_replace('{description}','',$this->page); 
        $this->page = str_replace('{photo}','',$this->page); 
        $categories = " ";
        foreach($listCategories as $category){
            $categories .= "<option value='". $category['id'] ."'>" . $category['name'] . "</option>";
        }
        $this->page = str_replace('{categories}',$categories,$this->page);
        $this->displayPage();
    }

    /**
     * Affichage du formulaire contenant l'information à modifier
     *
     * @param [type] $new
     * @return void
     */
    public function updateForm($new, $listCategories){
        $this->page .= "<h1>Modification de l'information</h1>";
        $this->page .= file_get_contents('template/formNew.html');
        $this->page = str_replace('{action}','updateDB',$this->page);
        $this->page = str_replace('{id}',$new['id'],$this->page);
        $this->page = str_replace('{title}',$new['title'],$this->page);
        $this->page = str_replace('{description}',$new['description'],$this->page);
        $categories = " ";
        foreach($listCategories as $category){
            $selected = "";
            if ($new['category'] == $category['id']) {
                $selected = 'selected';
            }
            $categories .= "<option value='". $category['id']. "'".$selected.">" . $category['name'] . "</option>";    
        }
        $this->page = str_replace('{categories}',$categories,$this->page);
        $this->displayPage();
      
    }
    
    /**
     * Affiche la page article
     *
     * @return void
     */
    public function modal($new){
        $this->page .= file_get_contents('template/modal.html');
        $this->page = str_replace('{titre}',$new['title'],$this->page);
        $this->page = str_replace('{photo}','template/img/'.$new['photo'],$this->page);
        $this->page = str_replace('{article}',nl2br($new['description']),$this->page);
        $this->displayPage();
      
    }

}
