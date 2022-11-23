<?php
global $css;
global $banniere;
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mariage Morgane et Alexandre, les hiboux</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link rel="shortcut icon" type="image/ico" href="images/owl.ico"/>
</head>

<body>

<header>

    <div class="logo_programme">

        <!-- Menu burger -->
        <nav id="mySidenav" class="sidenav">
            <a id="closeBtn" href="#" class="close">x</a>
            <ul>
                <li><a href="/index.php">Accueil</a></li>
                <li><a href="/info.php">Informations</a></li>
                <li><a href="/galerie.php">Galerie</a></li>
                <li><a href="/blog.php">Blog</a></li>
                <li><a href="/contacts.php">Contacts</a></li>
            </ul>
        </nav>
        <a href="#" id="openBtn" class="burger_menu">
            <img src="images/burger-bar.png" alt="menu_burger">
        </a>
        <!-- Fin menu burger -->

    </div>

    <nav>
        <ul>
            <li><img src="images/logo.png" alt="Logo" id="logo"></li>
            <li><a href="/index.php">Accueil</a></li>
            <li><a href="/info.php">Informations</a></li>
            <li><a href="/galerie.php">Galerie</a></li>
            <li><a href="/blog.php">Blog</a></li>
            <li><a href="/contacts.php">Contacts</a></li>
        </ul>
    </nav>
        

    


<?php if($banniere){ ?>
    <div id="baniere">
        <img src="images/ban1.jpg" alt="bannière photos Morgane et Alexandre">
    </div>
<?php } ?>


</header>


