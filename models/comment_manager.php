<?php
require_once 'manager.php';
class CommentManager extends Manager
{

    public function creatCom($nom, $com, $id)
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
    public function deleteCom($idcom)
    {
        try {
            $con = getDataBaseConnexion();
            $req = "DELETE FROM com where id = '$idcom'";
            $stmt = $con->query($req);

        } catch (PDOException $e) {

        }

    }

    //signaler un commentaire
    public function signaler($idcom)
    {

        $con = getDataBaseConnexion();
        $req = "UPDATE com set signaler = '1' where id = '$idcom'";
        $stmt = $con->query($req);

    }
    /****************** */

    public function completeCom($id)
    {

        $con = getDataBaseConnexion();
        $req = "SELECT * from com where articleId = '$id'";
        $stmt = $con->query($req);
        $tableau = array();
        while ($donnees = $stmt->fetch()) {

            $id = "$donnees[id]";
            $nom = "$donnees[nom]";
            $com = "$donnees[com]";
            $articleId = "$donnees[articleId]";
            $signaler = "$donnees[signaler]";

            $Commentaire = new Commentaire($id, $nom, $com, $articleId, $signaler);
            array_push($tableau, $Commentaire);

        }
        return $tableau;

    }

    //Commentaire Signaler affichage
    public function showCommentsSignaled()
    {
        $con = getDataBaseConnexion();
        $req = "SELECT * from com where signaler = '1'";
        $stmt = $con->query($req);
        $tableau = array();
        while ($donnees = $stmt->fetch()) {
            $id = "$donnees[id]";
            $nom = "$donnees[nom]";
            $com = "$donnees[com]";
            $articleId = "$donnees[articleId]";
            $signaler = "$donnees[signaler]";

            $Commentaire = new Commentaire($id, $nom, $com, $articleId, $signaler);
            array_push($tableau, $Commentaire);

        }
        return $tableau;

    }

    //afficher commentaire enfonction de l'arcticle specifique
    public function showComments($id)
    {

        $con = getDataBaseConnexion();
        $req = "SELECT * from com where articleId = '$id'";

        $stmt = $con->query($req);
        $tableau = array();
        while ($donnees = $stmt->fetch()) {
            $id = "$donnees[id]";
            $nom = "$donnees[nom]";
            $com = "$donnees[com]";
            $articleId = "$donnees[articleId]";
            $signaler = "$donnees[signaler]";

            $Commentaire = new Commentaire($id, $nom, $com, $articleId, $signaler);
            array_push($tableau, $Commentaire);

        }
        return $tableau;

    }

}
