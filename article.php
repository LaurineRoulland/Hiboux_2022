<?php

require_once("config.php");
global $racine;
global $pdo;

$css = "style_article";
require_once ("includes/header.php");

// -----------------------------------------------
// Affichage d'un article
if(isset($_GET["id"]) && !empty($_GET["id"]) && is_int(intval($_GET["id"]))){
    // Récupération de l'article :
    $article = $pdo->query("SELECT * FROM articles WHERE id_article = $_GET[id] AND statut_article = 1 LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    if(isset($article)){
        $content = stripslashes(html_entity_decode($article["content_article"]));
    } else {
        $content = "<p>Cet article n'existe pas.</p>";
    }

} ?>

<main class="article">
    <article>
        <div class="centre">
            <img src="images/blog/<?php echo $article['image_article'];?>" alt="<?php echo $article['title_article'];?>">
            <h1><?php echo $article['title_article'];?></h1>
        </div>
        <div>
            <?php echo $content;?>
        </div>

    </article>

</main>

<?php
require_once ("includes/footer.php");
?>