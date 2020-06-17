<?php

session_start();

?>


<html>
    <head>
        <title>L'Agenda</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/agenda.css">
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
                    <li><a href='planning.php'>Planning</a></li>
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
                        <li><a href='planning.php'>Planning</a></li>
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

                        $con = mysqli_connect('localhost','root','','reservationsalles');
                        $query = "SELECT `login` FROM `utilisateurs` WHERE  `login`='$_SESSION[login]'";
                        $result2 = mysqli_query($con, $query);
                        $value = mysqli_fetch_assoc($result2);
                        echo "<p>Bonjour ".$value['login']." et bienvenue sur :</p>
                                <h1 id='titre-co'>L'Agenda</h1>
                                <h2 id='sous-titre-co'>Réserve ton créneau</h2>";
                    }
                    else{
                        echo "<h1 id='titre-no-co'>L'Agenda</h1>
                                <h2 id='sous-titre-no-co'>Réserve ton créneau</h2>";
                    }
                    ?>
                </div>
            </section>
            <section class="main-article">
                <div id="art-gauche">
                    <h3>Se connecter</h3><br>
                    <p>Accédez à votre espace perso afin de prendre un rendez-vous sur l'agenda. </p><br>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/wjF7vP_cudg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                    <form class="bouton-basic"  action=connexion.php>
                        <input id="buttong" type="submit" value="Se connecter">
                    </form>
                </div>
                <div id="art-droite">
                    <div>
                        <h3>Créer un compte</h3><br>
                        <p>L'Agenda vous permet de prendre un rendez-vous en ligne.</p><br>
                    </div>
                    
                    
                    <div class="mini-galerie">
                        <img src="css/images/agenda-1.jpg" alt="agenda screen">
                        <img src="css/images/agenda-2.jpg" alt="agenda screen">
                        <img src="css/images/agenda-3.jpg" alt="agenda screen">
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