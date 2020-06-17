<?php

session_start();

if(isset($_SESSION['login'])){



?>


<html>
    <head>
        <title>Réserver</title>
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


        <?php
        
        if(isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['date']) && isset($_POST['heure-debut']) && isset($_POST['heure-fin'])){

            if($_POST['heure-fin']==($_POST['heure-debut']+1)){

            $dated=$_POST['date']." ".$_POST['heure-debut'].':00:00';
            $datef=$_POST['date']." ".$_POST['heure-fin'].':00:00';
            $titre=addslashes($_POST['titre']);
            $desc=addslashes($_POST['description']);
            $id=$_SESSION['id'];
            
            $db = mysqli_connect("localhost","root","","reservationsalles");
            $request2="INSERT INTO `reservations`(`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES ('$titre','$desc','$dated','$datef',$id)";
            $query2= mysqli_query($db,$request2);

            header('location:planning.php');
        
            } 
            
            else{
                echo "Vous pouvez uniquement réserver des créneaux d'une heure.";
                }
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
            <select name="heure-debut" id="heure-debut" required>
                <option value="08">08 H</option>
                <option value="09">09 H</option>
                <option value="10">10 H</option>
                <option value="11">11 H</option>
                <option value="12">12 H</option>
                <option value="13">13 H</option>
                <option value="14">14 H</option>
                <option value="15">15 H</option>
                <option value="16">16 H</option>
                <option value="17">17 H</option>
                <option value="18">18 H</option>

            </select>
            
            
            <label for="heure-fin">A <span>*<span> :</label>
            <select name="heure-fin" id="heure-fin" required>
                <option value="09">09 H</option>
                <option value="10">10 H</option>
                <option value="11">11 H</option>
                <option value="12">12 H</option>
                <option value="13">13 H</option>
                <option value="14">14 H</option>
                <option value="15">15 H</option>
                <option value="16">16 H</option>
                <option value="17">17 H</option>
                <option value="18">18 H</option>
                <option value="19">19 H</option>

            </select>
            
            <br><br>

            <input id="button-valider" type="submit" value="Ajouter l'évenement" name="submit">
            </form>
            </section>

    </main>

        </body>
</html>

<?php 

}

else{
    header("location:connexion.php");
}

?>