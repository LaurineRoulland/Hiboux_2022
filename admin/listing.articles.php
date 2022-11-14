<?php
include_once("includes/header.php");
global $articles;
?>

<main>
    <h2>Gestion des articles</h2>
    <p class="add"><a href="?action=add">Ajouter un article</a></p>
    <table>
        <thead>
        <tr>
            <td>Id</td>
            <td>Date</td>
            <td>Titre</td>
            <td>Statut</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($articles) && !empty($articles)){
            foreach($articles as $index => $article){
                ?>
                <tr>
                    <td><?php echo $article["id_article"]; ?></td>
                    <td><?php echo $article["date_article"] ?></td>
                    <td><?php echo $article["title_article"] ?></td>
                    <td><?php echo $statut = $article["statut_article"] ? "publié" : "en attente"; ?></td>
                    <td><a href="?action=edit&id=<?php echo $article["id_article"];?>">Editer</a></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>



</main>

<?php
include_once("includes/footer.php");
?>