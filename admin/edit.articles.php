<?php
include_once("includes/header.php");
global $article;
global $h2;
global $action;
global $id;
global $errors;
global $msg;
?>
    <main>
        <h2><?php echo $h2; ?></h2>
        <?php if(!empty($errors)) echo "<p class='error'>$errors</p>";
            elseif(!empty($msg)) echo "<p class='success'>$msg</p>"; ?>
        <form method="post" action="?action=<?php echo $action; if(!empty($id)) echo "&id=".$id; ?>">
            <label for="title_article">Titre :</label>
            <input type="text" name="title_article" value="<?php if(!empty($article["title_article"])) echo $article["title_article"];?>">
            <label for="date_article">Date de publication :</label>
            <input type="date" name="date_article" value="<?php echo $article["date_article"]; ?>">
            <label for="image_article">Image d'illustration :</label>
            <?php if(!empty($article["image_article"])){?>
               <?php echo $article["image_article"];?>
            <?php } ?>
            <input type="file" name="image_article">
            <label for="content_article">Contenu :</label>
            <textarea name="content_article" id="content_article" cols="100" rows="20"><?php if(!empty($article["content_article"])) echo $article["content_article"];?></textarea>
            <label for="statut_article">Statut :</label>
            <select name="statut_article" id="statut_article">
                <option value="0" <?php echo $selected = empty($article["statut_article"]) || !$article["statut_article"] ? "selected" : ""; ?>>En attente</option>
                <option value="1" <?php echo $selected = !empty($article["statut_article"]) && $article["statut_article"] ? "selected" : ""; ?>>Publié</option>
            </select>

            <input type="submit" value="Enregistrer">
        </form>

    </main>

<?php
include_once("includes/footer.php");
?>