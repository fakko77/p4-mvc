<?php
require_once 'manager.php';
class ArticleManager extends Manager
{

    public function readArticlePage($id)
    {
        $con = getDataBaseConnexion();
        $req = "SELECT * from articles where id = '$id'";
        $stmt = $con->query($req);

        while ($donnees = $stmt->fetch()) {
            $titre = "$donnees[titre]";
            $contenu = "$donnees[contenu]";
            $date = "$donnees[date]";
            $article = new Article($titre, $contenu, $date);
            return $article;
        }
    }

    public function getAllArticles()
    {
        $con = getDataBaseConnexion();
        $req = 'SELECT * from articles';
        $rows = $con->query($req);
        return $rows;

    }

    public function readArticle($id)
    {
        $con = getDataBaseConnexion();
        $req = "SELECT * from articles where id = '$id'";
        $stmt = $con->query($req);
        $tableau = array();
        while ($donnees = $stmt->fetch()) {
            array_push($tableau, $donnees);

        }
        return $tableau;

    }

    public function creatArticle($titre, $contenu)
    {
        try {
            $con = getDataBaseConnexion();
            $req = "INSERT INTO articles (titre,contenu) values ('$titre','$contenu')";
            $stmt = $con->query($req);
            header("location:admin-panel.php");
        } catch (PDOException $e) {

        }

    }

    public function updateArticle($titre, $contenu, $id)
    {
        try {
            $con = getDataBaseConnexion();
            $req = "UPDATE articles set titre = '$titre' , contenu = '$contenu' where id = '$id'";
            $stmt = $con->query($req);
            header("location:admin-edit.php");

        } catch (PDOException $e) {

        }

    }

    public function showTitle($id)
    {
        try {
            $con = getDataBaseConnexion();
            $req = "SELECT titre from articles where id = '$id'";
            $stmt = $con->query($req);
            while ($donnees = $stmt->fetch()) {
                echo "<h2>$donnees[titre]</h2>";
            }

        } catch (PDOException $e) {

        }

    }
    public function deleteArticle($id)
    {

        try {
            $con = getDataBaseConnexion();
            $req = "DELETE FROM articles where id = '$id'";
            $stmt = $con->query($req);

        } catch (PDOException $e) {

        }

    }

    public function panel()
    {
        try {
            $con = getDataBaseConnexion();
            $req = "SELECT * FROM articles ORDER BY date desc";
            $stmt = $con->query($req);
            $tableau = array();
            while ($donnees = $stmt->fetch()) {

                array_push($tableau, $donnees);

            }

        } catch (PDOException $e) {

        }
        return $tableau;
    }

    public function articleView()
    {

        try {
            $con = getDataBaseConnexion();
            $req = "SELECT * FROM articles ORDER BY date desc";
            $stmt = $con->query($req);
            $tableau = array();
            while ($donnees = $stmt->fetch()) {
                array_push($tableau, $donnees);

            }

        } catch (PDOException $e) {

        }
        return $tableau;
    }

}
