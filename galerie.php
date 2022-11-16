<?php
$css = "style_gallerie";
$directory = "images/photos/";
$date = new DateTime;
$now = $date->format("Y-m-d-H-i-s");
if(!empty($_FILES)){
    if(is_array($_FILES["pictures"]["name"])){ // multiple
        $count = count($_FILES["pictures"]["name"]);
        for($i=0;$i<$count;$i++){
            $name = strtolower($_POST["author"])."_".$now."_".$i."_".".jpg";
            move_uploaded_file($_FILES['pictures']['tmp_name'][$i],$directory.$name);
        }
    }else{
        $name = strtolower($_POST["author"])."_".$now.".jpg";
        move_uploaded_file($_FILES['pictures']['tmp_name'],$directory.$name);
    }

    unset($_FILES);
    unset($_POST);
    // Envoi d'un mail
    $content = "De nouvelles photos ont été postées sur le site !";
    mail('morgane.roulland@hotmail.fr', 'Nouvelles photos via Hiboux 2022', $content);
}


// prendre tout le contenu du dossier photos : 
$pictures_list = array_diff(scandir($directory), array('..', '.'));;


require_once ("includes/header.php"); ?>

        <main class="gallerie">

            <aside>
                <h1>Bienvenue</h1>
                <h2>dans la galerie photos !</h2>
            </aside>

            <section>

                <article>
                    <img src="images/photo.png" alt="icone appareil photo">
                    <p>Ca y est, l'événement est passé et vous allez pouvoir désormais partager tous vos trésors photographiques !</p>
                    <p>Pour cela, rien de plus simple. Envoyez vos photos à Morgane & Alex par WhatsApp ou mail <br>
                        (roulland.morgane@gmail.com ou alexandre.bellettre@gmail.com)</p>
                    <p>Ou complétez le formulaire ci-dessous pour ajouter vos photos à la galerie en direct !</p>
                    <p><a href="https://josepho.io/g/s/63344/f376c6ff4a39c8585c62c4b2e4c8c27a" target="_blank">Voir la galerie du Photobooth</a> </p>
                    <p>Pour les photos de groupe ainsi que toutes celles du photographe, nous vous donnerons plus de détails à partir de fin Octobre.</p>
                </article>

                <article>
                    <form method="post" action="" name="upload" enctype="multipart/form-data">
                        <h3>Postez !</h3>
                        <input type="text" name="author" placeholder="Qui êtes vous ?" class="shadows">
                        <input type="file" name="pictures[]" id="pictures" accept="image/jpeg,image/png" multiple>
                        <input type="submit" value="Envoyer" class="shadows">
                    </form>
                </article>

                <article class="photos">
                    <?php
                    if(!empty($pictures_list)){
                        foreach($pictures_list as $picture){
                            echo '<a href="'.$directory.$picture.'" target="_blank"><img src="'.$directory.$picture.'"></a>';
                        }
                    }
                    ?>
                </article>
                
            </section>
            
        </main>
<?php require_once("includes/footer.php"); ?>
