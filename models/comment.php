<?php 


/* Possibiliter de cree la class commentaire sans construre et cree mes function dans celle-ci */
class Commentaire
{
    private $_id;
    private $_nom;
    private $_com;
    private $_articleId;
    private $_signaler;

    function __construct($id, $nom, $com,$articleId,$signaler)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->com = $com;
        $this->articleId = $articleId;
        $this->signaler = $signaler;
    }
    public function id(){

        return $this->id;
     
     }
     public function nom(){
         
         return $this->nom;
     }
     public function com(){
 
         return $this->com;
     }
     public function articleIdm(){
         
        return $this->articleId;
    }
    public function signaler(){

        return $this->signaler;
    }
  



}
//crée un commentaire 

    
    


?> 