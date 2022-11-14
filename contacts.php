<?php
$css = 'style_contact';
require_once ('includes/header.php');

if(!empty($_POST)){
    if(!empty($_POST['email']) && !empty($_POST['message'])){
        $content =
            "<p><b>Nom :</b>".$_POST["nom"]."</p>
            <p><b>Email :</b>".$_POST["email"]."</p>
            <p><b>Message :</b>".$_POST["message"]."</p>
            ";
        mail('morgane.roulland@hotmail.fr', 'Contact via Hiboux 2022', $content);
        $success = true;
        unset($_POST);
    }else{
        $error = true;
    }
}

?>

<main class="contacts">

    <!--  LES MARIES -->
    <figure id="les_maries">
        <img src="images/mo&al.jpg" alt="Morgane et Alexandre">
        <figcaption><strong>Morgane et Alexandre</strong>, <br> Les futurs mariés !</figcaption>
    </figure>

    <!-- LES TEMOINS  -->
    <div id="les_temoins">
        <figure class="temoins">
            <img src="images/Guillaume.jpg" alt="Guillaume">
            <figcaption><span>Guillaume</span>, <br> Le témoin du marié !</figcaption>
        </figure>

        <figure class="temoins">
            <img src="images/Nicolas.jpg" alt="Nicolas">
            <figcaption><span>Nicolas</span>, <br> Le témoin du marié !</figcaption>
        </figure>

        <figure class="temoins">
            <img src="images/Lau.jpg" alt="Laurine">
            <figcaption><span>Laurine</span>, <br> La témoin de la mariée !</figcaption>
        </figure>

        <figure class="temoins">
            <img src="images/Marc.jpg" alt="Marc">
            <figcaption><span>Marc</span>, <br> Le témoin de la mariée !</figcaption>
        </figure>
    </div>

    <!-- LES DEMOISELLES & GARCON D'HONNEUR -->
    <div id="les_demoiselles_gars">
        <figure class="demoiselles_gars">
            <img src="images/Tiph.jpg" alt="Tiphanie">
            <figcaption><span>Tiphanie</span>, <br> La demoiselle d'honneur !</figcaption>
        </figure>

        <figure class="demoiselles_gars">
            <img src="images/Michael.jpg" alt="Michael">
            <figcaption><span>Michael</span>, <br> Le garçon d'honneur !</figcaption>
        </figure>

        <figure class="demoiselles_gars">
            <img src="images/Laura.jpg" alt="Laura" id="Laura">
            <figcaption><span>Laura</span>, <br> La demoiselle d'honneur !</figcaption>
        </figure>
    </div>

    <!--  FORMULAIRE CONTACT  -->
    <aside id="Contacts">
        <p id="text_contact">
            Afin de prévenir toute allergie <br> ou régime alimentaire spécifique, <br>
            merci de nous contacter afin d'établir au mieux <br> un repas adapté !
        </p>
        <form method="post" action="contacts.php#Contacts">
            <?php if(isset($success)){?>
                <p class="success">Votre message a bien été envoyé.</p>
            <?php } else if (isset($error)){ ?>
                <p class="error">Veuillez compléter tous les champs pour envoyer votre message.</p>
            <?php } ?>
            <p>
                <label for="nom">Nom :</label><br>
                <input type="text" name="nom" id="nom" placeholder="Votre Nom" value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : ""; ?>">
            </p>
            <p>
                <label for="email">Email :</label><br>
                <input type="email" name="email" id="email" placeholder="Votre email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""; ?>">
            </p>
            <p>
                <label for="message">Message :</label><br>
                <textarea name="message" id="message" placeholder="Dites nous vos commentaires ;)" rows="10" cols="55"><?php echo isset($_POST['message']) ? $_POST['message'] : ""; ?></textarea>
            </p>
            <p>
                <input type="submit" value="Envoyer" id="envoyer">
            </p>


        </form>
    </aside>

</main>

<?php require_once ('includes/footer.php'); ?>