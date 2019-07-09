<?php
require_once('models/comment_manager.php');

$CommentManager = new CommentManager();
function showsComAdmCRLT(){
    $CommentManager = new CommentManager();
    $id = $_GET['id'];
    $tableau = $CommentManager -> completeCom($id);
   /**/ $tableauAffiche =[];
    $a= 0;
    $b = count($tableau) ; 
    $val;

    while($a < $b){
        $tb = $tableau[$a];
        $com = $tb->com();
        $nom = $tb->nom();
        $id = $tb->id();
        $articleId = $tb->articleIdm();
        $signaler = $tb->signaler();
        if($signaler == "1"){
        $val =  "<span style ='background:rgba(193,66,66,0.5);'>
        <i class='fas fa-id-card'></i> : $nom
        <br>
        <i class='far fa-comments'></i> : $com
        <br>
        <a href='index.php?url=deleteCom.php&idcom=$id&id=$articleId' title='Supprimer commentaire'><i class='fas fa-trash-alt'></i></a>
        </span>";
      
        
        }else {
    
        $val = 	"<span style =''>
            <i class='fas fa-id-card'></i> : $nom
            <br>
            <i class='far fa-comments'></i> : $com
            <br>
            <a href='index.php?url=deleteCom.php&idcom=$id&id=$articleId' title='Supprimer commentaire'><i class='fas fa-trash-alt'></i></a>
            </span>";
            
            
        }
        array_push($tableauAffiche,  $val );
      
        $a++;	}
                          
    require('views/admin-header.php');
    require('views/admin-com.php');


}
function showsComSCRLT(){
    $CommentManager = new CommentManager();
   $tableau = $CommentManager -> showCommentsSignaled();
    //var_dump($tableau);
    $a= 0;
    $b = count($tableau) ; 
    while($a < $b){
        $tb = $tableau[$a];
        $tableauAffiche = [];
       // var_dump($tb);
        $com = $tb->com();
        $nom = $tb->nom();
        $id = $tb->id();
        $articleId = $tb->articleIdm();
        $signaler = $tb->signaler();
       $val = " <i class='fas fa-id-card'></i> : $nom
        <br>
        <i class='far fa-comments'></i> : $com
        <br>
        <a href='index.php?url=admin-com.php&id=$articleId' title='gerer'><i class='fas fa-cog'></i></a>
    
    <br>
    <br>";
    array_push($tableauAffiche,  $val );
        $a++;

                            }
    require('views/admin-header.php');
    require('views/admin-com-signaler.php');
   
}

function UsersCreatComCRLT(){
    $CommentManager = new CommentManager();
  
    $id = $_GET['id'];
    if(isset($_POST["addcom"]))  
    {    
    $nom = $_POST['nom'];
    $com = $_POST['com'];
    $CommentManager -> creatCom($nom , $com , $id);
    }  
   

}
function admDeleteComCRLT(){
    $CommentManager = new CommentManager();

$id = $_GET['id'];
$idcom = $_GET['idcom'];
$CommentManager->deleteCom($idcom);
header("location:index.php?url=admin-com.php&id=$id");  
}

function userComSCRLT(){
    $CommentManager = new CommentManager();
    $id = $_GET['id'];
    $idcom = $_GET['idcom'];
    $CommentManager->signaler($idcom);

    
header("location:index.php?url=post.php&id=$id");  

}
?>