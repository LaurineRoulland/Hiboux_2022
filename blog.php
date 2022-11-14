<?php

require_once("config.php");
global $racine;
global $pdo;

$css = "style_blog";
require_once ("includes/header.php");


// ------------------------------------------------
// Affichage de tous les articles

$articles = $pdo->query("SELECT * FROM articles WHERE statut_article = 1 ORDER BY date_article DESC")->fetchAll();
// Traitement de l'affichage des articles
foreach($articles as $index => $article) {
    $content = stripslashes(html_entity_decode($article["content_article"]));
    $articles[$index]["resume_article"] = substr($content, 0, strpos($content, " ", 180)) . " ...";
}
// ------------------------------------------------
?>
<main class="blog">
    <section>
        <div id="blog">
            <h2>Parcourir le blog</h2>
            <p>pour découvrir toutes les nouveautés</p>
        </div>
        <div class="card">
            <?php
            foreach($articles as $article){ ?>
                <article class="card_article">
                    <img src="images/blog/<?php echo $article["image_article"];?>" alt="<?php echo $article["title_article"];?>" class="img_card">
                    <h4><?php echo $article["title_article"];?></h4>
                    <p><?php echo $article["resume_article"];?></p>
                    <p><a href="/article.php?id=<?php echo $article["id_article"]; ?>">Lire la suite...</a></p>
                </article>
            <?php } ?>
        </div>
    </section>
</main>

<?php
require_once ("includes/footer.php");
?>






