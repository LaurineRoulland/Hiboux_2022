<?php

require_once ("../config.php");
global $pdo;
$action = isset($_GET["action"]) ? $_GET["action"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";

if($action == "edit" || $action == "add"){

    if($action == "edit"){
        $h2 = "Modifier un article";
        $article = $pdo->query("SELECT * FROM articles WHERE id_article = $id")->fetch(PDO::FETCH_ASSOC);

    }else{
        $h2 = "Ajouter un article";
        $article = [];
    }


    if(isset($_POST) && !empty($_POST)){
        $errors = "";
        // Vérification des champs récupérés
        if(!empty($_POST["title_article"]) && strlen($_POST["title_article"]) > 2){
            $article['title_article'] = $_POST["title_article"];
        }else{
            $errors .= "Le titre est vide ou trop court. ";
        }
        if(!empty($_POST["content_article"]) && strlen($_POST["content_article"]) > 2){
            $article['content_article'] = $_POST["content_article"];
        }else{
            $errors .= "Le contenu de l'article est vide ou trop court. ";
        }
        if(!empty($_POST["image_article"]) && strlen($_POST["image_article"]) > 2){
            $article['image_article'] = $_POST["image_article"];
        }else{
            $errors .= "L'image est obligatoire. ";
        }
        $article['date_article'] = !empty($_POST["date_article"]) ? $_POST["date_article"] : DateTime::createFromFormat('m/d/Y', 'NOW');
        $article['statut_article'] = !empty($_POST["statut_article"]) ? $_POST["statut_article"] : 0;

        // if error = vide
        if(empty($errors)){
            // Si $id = UPDATE
            if(!empty($id)){
                $result = $pdo->query("UPDATE articles SET 
                    title_article = '$article[title_article]', 
                    date_article = '$article[date_article]', 
                    image_article = '$article[image_article]', 
                    content_article = '".addslashes(htmlentities($article['content_article']))."',
                    statut_article = '$article[statut_article]' WHERE id_article = $id")->execute();
                $msg = "L'article est correctement mis à jour";
            }else{
                $result = $pdo->query("INSERT INTO articles (title_article, date_article, image_article, content_article, statut_article)
                                    VALUES ('$article[title_article]',
                                            '$article[date_article]',
                                            '$article[image_article]',
                                            '".addslashes(htmlentities($article['content_article']))."',
                                            '$article[statut_article]')
                                    ");

                $msg = "L'article est bien ajouté";
                $id = $pdo->lastInsertId();
            }

            $action = "edit";
        }
    }


    include("edit.articles.php");


}else{
    $articles = $pdo->query("SELECT * FROM articles")->fetchAll(PDO::FETCH_ASSOC);
    include("listing.articles.php");
}