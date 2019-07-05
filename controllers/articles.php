<?php 

function homeCRLT(){
    require('views/utilisateur-head.php');
   $tableau =  articleView();
   $a= 0;
   $b = count($tableau) ; 
  
   while($a < $b){
    $acc = $tableau[$a];

   echo"<div class='post-preview'>
   <a href='index.php?url=post.php&id=$acc[id]'>
     <h2 class='post-title'>
     $acc[titre]
     </h2>
     <h3 class='post-subtitle'>
     $acc[contenu]
     </h3>
   </a>

   <p class='post-meta'>Publier le $acc[date]</p>
 </div>
 <hr>";
 $a++;
   }
  
    require('views/utilisateur-footer.php');  
}

function addArticleCRLT(){

     
    if(isset($_POST["addArticle"]))  
    {    
    $titre = $_POST['titre'];
    $contenu = $_POST['area1'];
   /* $articles = new articles();
    $articles ->*/ creatArticle($titre , $contenu);
   
    }  
   require('views/admin-header.php');
    require('views/admin-panel.php');
}
function tableAdmCRLT(){
    $tableau = panel();
   
    $a= 0;
    $b = count($tableau) ; 
    $tableauAfficher =[];
    while($a < $b){
    $tableaut = $tableau[$a];
     $val = "</tr>
    <td width=15% > $tableaut[titre] </td>
    <td width=50% > $tableaut[contenu] </td>
    <td width=10%  > $tableaut[date] </td>
     
  
   <td><a href='index.php?url=delete.php&id=$tableaut[id] '><button
    type='button'>
        supprimer
       </button></a></td>
       <td><a href='index.php?url=update.php&id=$tableaut[id]'><button
       type='button'>
       update
       </button></a></td>
   <td><a href='index.php?url=admin-com.php&id=$tableaut[id]'><i class='far fa-comments'></i></a></td>";

        $a++;
        array_push($tableauAfficher,  $val );
    }
  
 
    require('views/admin-header.php');
    require('views/admin-edit.php');
    


}
function showsPageCRLT(){

    $id = $_GET['id'];
    $article =  readArticlePage($id);
    $id = $_GET['id'];
   
    $tableau = showComments($id);

    $a= 0;
    $b = count($tableau) ; 
    $tableauAffiche = [];
      while($a < $b){
      $tb = $tableau[$a];
 
       // var_dump($tb);
      $com = $tb->com();
      $nom = $tb->nom();
      $id = $tb->id();
      $articleId = $tb->articleIdm();
      $signaler = $tb->signaler();
      $val = "<i class='fas fa-id-card'></i> : $nom
      <br>
      <i class='far fa-comments'></i> : $com
      <br>
      <a href='index.php?url=signaler.php&idcom=$id&id=$articleId' title='Signaler le commentaire'><i class='fas fa-exclamation-triangle'></i></a>
      <br>
      <br>";
      array_push($tableauAffiche,  $val );
      $a++;
     
                }
    require('views/utilisateur-post.php'); 
}

function admDeleteArticleCRLT(){
    $id = $_GET['id'];
    deleteArticle($id);
    header("location:index.php?url=admin-edit.php");  
}

function admUpdateArticleCRLT(){

    $id = $_GET['id'];
    $tableau = readArticle($id); 
    
$a= 0;
$affiche;
$b = count($tableau) ; 
while($a < $b){
$tableau = $tableau[$a];
$affiche =  "<form method='post'>  
      <input style='display:none;' name='id' type='text' value='$tableau[id]' disabled />
                     <label>Titre</label>  
                     <input type='text' name='titre' class='form-control' value='$tableau[titre]' />  
                     <br />  
                     <label>Text</label>  

                      <textarea name='area1'   style='width: 100%;'>$tableau[contenu]</textarea>
                     <br />

                     <br />  
                     <input type='submit' name='update' class='btn btn-info' value='send' />  
                </form>  ";
	$a++;
}
   
    if(isset($_POST["update"]))  
          {  
                $titre = $_POST['titre'];
                $contenu = $_POST['area1'];
                echo $titre;
                echo $contenu;
                updateArticle($titre , $contenu , $id);
     
          }  
         
    require('views/admin-header.php');
    require('views/update.php');


}
?>