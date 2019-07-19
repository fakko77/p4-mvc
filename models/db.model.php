<?php
function getDataBaseConnexion()
{

    try
    { $host = "localhost";
        $username = "root";
        $password = "";
        $database = "p4";
        $message = "";
        $pdo = new PDO("mysql:host=$host; dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        die();
    }

}
function checklog()
{

    session_start();
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "p4";
    $message = "";
    try
    {
        $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST["login"])) {
            if (empty($_POST["username"]) || empty($_POST["password"])) {
                $message = '<label>Veuillez completer les champs</label>';
            } else {
                $query = "SELECT * FROM users WHERE username = :username AND password = :password";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        'username' => $_POST["username"],
                        'password' => $_POST["password"],
                    )
                );
                $count = $statement->rowCount();
                if ($count > 0) {
                    $_SESSION["username"] = $_POST["username"];
                    header("location:index.php?url=admin-panel.php");
                } else {
                    $message = '<label>Mauvais identifiant ou mot de passe</label>';
                }
            }
        }
    } catch (PDOException $error) {
        $message = $error->getMessage();
    }
}
