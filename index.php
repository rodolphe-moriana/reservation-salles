<?php

session_start();

?>


<html>
    <head>
        <title>Chat & Co</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/discussion.css">
        <link href="https://fonts.googleapis.com/css2?family=Chivo&family=Noto+Sans+JP&display=swap" rel="stylesheet">
    </head>

    <body>
        
        <header>
            <section>

                <?php

                if(isset($_SESSION['login']) && ($_SESSION['login']!='admin')) {
    
                    echo "

                <nav>
                <ul>
                    <li><a href='index.php'>Accueil</a></li>
                    <li><a href='discussion.php'>Chat</a></li>
                    <li><a href='profil.php'>Profil</a></li>
                    <li><a href='logout.php'>Déconnexion</a></li>
                </ul>
                </nav>

                 ";}
                 elseif(isset($_SESSION['login']) && ($_SESSION['login']=='admin')) {
                    
                    echo "

                    <nav>
                    <ul>
                        <li><a href='index.php'>Accueil</a></li>
                        <li><a href='discussion.php'>Chat</a></li>
                        <li><a href='profil.php'>Profil</a></li>
                        <li><a href='admin.php'>Admin</a></li>
                        <li><a href='logout.php'>Déconnexion</a></li>
                    </ul>
                    </nav>
    
                     ";}
                else{
                    echo "

                <nav>
                <ul>
                    <li><a href='index.php'>Accueil</a></li>
                    <li><a href='inscription.php'>Inscription</a></li>
                    <li><a href='connexion.php'>Connexion</a></li>
                </ul>
                </nav>

                 ";} ?>
    
            </section>
        </header>

        <main>
            <section class="main-article">
                <div id="titre-banner">

                    
                    <?php

                    if(isset($_SESSION['login'])){
                        $con = mysqli_connect('localhost','root','','discussion');
                        $query = "SELECT `login` FROM `utilisateurs` WHERE  `login`='$_SESSION[login]'";
                        $result2 = mysqli_query($con, $query);
                        $value = mysqli_fetch_assoc($result2);
                        echo "<p>Bonjour ".$value['login']." et bienvenue sur :</p>
                                <h1 id='titre-co'>Chat & Co</h1>
                                <h2 id='sous-titre-co'>Venez Discuter !</h2>";
                    }
                    else{
                        echo "<h1 id='titre-no-co'>Chat & Co</h1>
                                <h2 id='sous-titre-no-co'>Venez Discuter !</h2>";
                    }
                    ?>
                </div>
            </section>
            <section class="main-article">
                <div id="art-gauche">
                    <h3>Se connecter</h3><br>
                    <p>Accédez à votre espace perso afin de communiquer avec vos amis présents sur le site. </p><br>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/eDz0nmQM3xw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    <form class="bouton-basic"  action=connexion.php>
                        <input id="buttong" type="submit" value="Se connecter">
                    </form>
                </div>
                <div id="art-droite">
                    <div>
                        <h3>Créer un compte</h3><br>
                        <p>Chat & Co vous permet de chatter avec vos amis !</p><br>
                    </div>
                    
                    
                    <div class="mini-galerie">
                        <img src="css/images/chat-1.jpg" alt="Chat screen">
                        <img src="css/images/chat-2.jpg" alt="Chat screen">
                        <img src="css/images/chat-3.png" alt="Chat screen">
                        <br><br>
                    </div>
                    
                    <div>
                        <form class="bouton-basic" action=inscription.php>
                        <input id="buttond" type="submit" value="S'inscrire">
                        </form>
                    </div>
                    
                </div>
            </section>
        </main>

    </body>
</html>