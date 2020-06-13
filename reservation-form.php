<?php

session_start();

?>


<html>
    <head>
        <title>Inscription</title>
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

            <section class="main-article form-input" id="main-article">

            <form class="form-style" id="form-inscri" method="post" action="">

            <h1>Ajout d'évenement</h1><br>

            <label for="titre">Titre<span>*</span> :</label><br>
            <input id="form-text" type="text" name="titre">
                
            <label for="description">Description<span>*</span> :</label><br>
            <input id="form-text" type="text" name="description">

            <label for="date-debut">Créneau de réservation<span>*</span> :</label><br>
            <select name="date-debut">
                <?php 
                
                $deb=8;
                
                while($deb>7 && $deb<19){
                    echo "<option>".$deb."-".($deb+1)."H</option>";
                    $deb++;
                }
                
                ?>

            </select>

            <br><br>

            <input id="button-valider" type="submit" value="S'inscrire" name="submit">
            </form>
            </section>
    </main>

        </body>
</html>