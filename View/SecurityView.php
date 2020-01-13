<?php

class SecurityView extends View {

    
    /**
     * Ajout d'un formulaire de saisie d'autentification
     *
     * @param [type] $listNews
     * @return void
     */

    public function addForm(){
        $this->page .= file_get_contents("template/formSecurity.html");
        $this->page = str_replace('{username}','',$this->page);
        $this->page = str_replace('{password}','',$this->page); 
        $this->displayPage();
    }

}
