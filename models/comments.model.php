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
function creatCom($nom, $com, $id)
{
    try {
        $con = getDataBaseConnexion();
        $req = "INSERT INTO com (nom,com, articleId) values ('$nom','$com','$id')";
        $stmt = $con->query($req);
        header("location:index.php?url=post.php&id=$id");
    } catch (PDOException $e) {
        echo $e;
    }
}


//suprimer un commentaire 
    function deleteCom($idcom)
    {
        try {
            $con = getDataBaseConnexion();
            $req = "DELETE FROM com where id = '$idcom'";
            $stmt = $con->query($req);

                } catch (PDOException $e) {

            }

    }

    //signaler un commentaire 
    function signaler($idcom)
    {

        $con = getDataBaseConnexion();
        $req = "UPDATE com set signaler = '1' where id = '$idcom'"; 
        $stmt = $con->query($req);
    
    
    }
/****************** */

   function completeCom($id){

    $con = getDataBaseConnexion();
        $req = "SELECT * from com where articleId = '$id'"; 
        $stmt = $con->query($req);
    $tableau = array();
        while($donnees = $stmt->fetch()){
           
             $id = "$donnees[id]";
             $nom = "$donnees[nom]";
             $com = "$donnees[com]";
             $articleId = "$donnees[articleId]";
             $signaler = "$donnees[signaler]";  

            $Commentaire = new Commentaire($id,$nom,$com,$articleId,$signaler);
            array_push($tableau,  $Commentaire );
            
           }
        return $tableau;


   }

    //Commentaire Signaler affichage 
    function showCommentsSignaled()
    {
        $con = getDataBaseConnexion();
        $req = "SELECT * from com where signaler = '1'"; 
        $stmt = $con->query($req);
        $tableau = array();
        while($donnees = $stmt->fetch()){
            $id = "$donnees[id]";
            $nom = "$donnees[nom]";
            $com = "$donnees[com]";
            $articleId = "$donnees[articleId]";
            $signaler = "$donnees[signaler]";  

           $Commentaire = new Commentaire($id,$nom,$com,$articleId,$signaler);
           array_push($tableau,  $Commentaire );
           
          }
       return $tableau;
    
    }

    //afficher commentaire enfonction de l'arcticle specifique 
    function showComments($id)
    {

        $con = getDataBaseConnexion();
        $req = "SELECT * from com where articleId = '$id'"; 

        
        $stmt = $con->query($req);
        $tableau = array();
        while($donnees = $stmt->fetch()){
            $id = "$donnees[id]";
            $nom = "$donnees[nom]";
            $com = "$donnees[com]";
            $articleId = "$donnees[articleId]";
            $signaler = "$donnees[signaler]";  

           $Commentaire = new Commentaire($id,$nom,$com,$articleId,$signaler);
           array_push($tableau,  $Commentaire );
           
          }
       return $tableau;
         
        

    }
    
    


?> 