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

        $db = mysqli_connect("localhost","root","","reservationsalles");
        $request="SELECT `id` FROM `utilisateurs` WHERE `login`='$_SESSION[login]'";
        $query= mysqli_query($db,$request);
        $value=mysqli_fetch_assoc($query);
        $_SESSION['id']=$value['id'];

        $dated=$_POST['date']." ".$_POST['heure-debut'].':00';
        $datef=$_POST['date']." ".$_POST['heure-fin'].':00';
        $titre=$_POST['titre'];
        $desc=$_POST['description'];
        $id=$_SESSION['id'];

        if(isset($titre) && isset($desc) && isset($dated) && isset($datef) && isset($id)){
            
        $request2="INSERT INTO `reservations`(`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES ('$titre','$desc','$dated','$datef',$id)";
        $query2= mysqli_query($db,$request2);

        header('location:planning.php');
        }

        

        ?>

            <section class="main-article form-input" id="main-article">

            <form class="form-style" id="form-inscri" method="post" action="">

            <h1>Ajout d'évenement</h1><br>

            <label for="titre">Titre<span>*</span> :</label><br>
            <input id="form-text" type="text" name="titre">
                
            <label for="description">Description<span>*</span> :</label><br>
            <input id="form-text" type="textarea" name="description">

            <label for="date_debut">Jour<span>*<span> :</label>
            <input type="date" name="date" id="date_debut" required>

            <label for="heure-debut">De<span>*<span> :</label>
            <input type="time" name="heure-debut" id="heure-debut" step="3600" min="08:00:00" max="18:00:00" required>
            
            <label for="heure-fin">A <span>*<span> :</label>
            <input type="time" name="heure-fin" id="heure-fin" step="3600" min="09:00:00" max="19:00:00" required>
            
            <br><br>

            <input id="button-valider" type="submit" value="Ajouter l'évenement" name="submit">
            </form>
            </section>

    </main>

        </body>
</html>