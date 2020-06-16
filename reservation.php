<?php

session_start();

?>


<html>
    <head>
        <title>Réservation</title>
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

        <?php

        $db = mysqli_connect("localhost","root","","livreor");

        $request="SELECT C.commentaire,C.date,U.login FROM commentaires as C INNER JOIN utilisateurs as U ON C.id_utilisateur=U.id ORDER BY C.date desc";
        $query=mysqli_query($db,$request);

        echo "<table id='table-livre'><thead><th colspan='2' id='thead-txt'>Vos Commentaires</th></thead><tbody>";

        while($value=mysqli_fetch_assoc($query)){

        echo "<tr><td id='left-livre'><p>Posté le : <p>".$value["date"]."<p> par </p>".$value["login"]."</td>";
        echo "<td id='right-livre'>".$value["commentaire"]."</td></tr>";
        }

        ?>