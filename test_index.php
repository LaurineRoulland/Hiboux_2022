<?php
// import du fichier de config
require_once ("config.php");
global $racine;
global $pdo;
$banniere = true;
$css = "style";
// Récupération des articles concernés
$query = $pdo->query("SELECT * FROM articles WHERE statut_article = 1 ORDER BY date_article DESC LIMIT 0,6");
$articles = $query->fetchAll();

// Traitement de l'affichage des articles
foreach($articles as $index => $article){
    $article["content_article"] = stripslashes(strip_tags(html_entity_decode($article["content_article"])));
    $articles[$index]["resume_article"] = substr($article["content_article"],0, strpos($article["content_article"], " ", 180)) . " ...";
}

require_once('includes/test_header.php');
?>
        <main class="home">
            
            <aside>
                <div id="date">
                    <h2>Le 10 Septembre</h2>
                    <div id="decompte_rebour">
                        <p>Mariage dans... <br>
                            <label id="decompte"></label>
                            <script type="text/javascript">
                                var Affiche=document.getElementById("decompte");
                                function Rebour() {
                                var date1 = new Date();
                                var date2 = new Date ("Sep 10, 2022 14:00:00");
                                var sec = (date2 - date1) / 1000;
                                var n = 24 * 3600;
                                if (sec > 0) {
                                j = Math.floor (sec / n);
                                h = Math.floor ((sec - (j * n)) / 3600);
                                mn = Math.floor ((sec - ((j * n + h * 3600))) / 60);
                                sec = Math.floor (sec - ((j * n + h * 3600 + mn * 60)));
                                Affiche.innerHTML = j +" jours <br>"+ h +" h "+ mn +" min et "+ sec + " sec";
                                window.status = "Temps restant : " + j +" j "+ h +" h "+ mn +"min "+ sec + "s ";}
                                tRebour=setTimeout ("Rebour();", 1000);}
                                Rebour();
                            </script>
                        </p>
                    </div>
                </div>
                
            </aside>

            <div class="logo_programme">
                <img src="images/programme_inverse.png" alt="programme" id="programme">
            </div> 


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
                        <p><a href="article.php?id=<?php echo $article["id_article"]; ?>">Lire la suite...</a></p>
                    </article>
                    <?php } ?>
                </div>
            </section>

            <div id="newsletter">
                <p>Vous souhaitez être au courant des dernières nouveautés ? <br>Inscrivez vous à la newsletter !</p>
                <a href="#">S'abonner !</a>
            </div>

        </main>
<?php
require_once('includes/test_footer.php');
?>