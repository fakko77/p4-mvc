<?php
class article{
    private $titre;
    private $contenu;
    private $date;

    function __construct($titre, $contenu ,$date)
    {
        $this->_titre = $titre;
        $this->_contenu = $contenu;
        $this->_date = $date;
    }

    public function titre(){

       return $this->titre;
    
    }
    public function contenu(){
        
        return $this->contenu;
    }
    public function date(){

        return $this->date;
    }
   
}


?>