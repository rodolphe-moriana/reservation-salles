<?php

session_start();

if(isset($_SESSION['login'])){

?>


<html>
    <head>
        <title>Réservation</title>
        <meta charset='UTF-8'>
        <link rel='stylesheet' href='css/agenda.css'>
        <link href='https://fonts.googleapis.com/css2?family=Chivo&family=Noto+Sans+JP&display=swap' rel='stylesheet'>
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
        <section class='main-article form-input' id='profil-article'>

        <div class="form-style" id="form-inscri">

        <?php

            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $db = mysqli_connect('localhost','root','','reservationsalles');
                $request="SELECT R.*,U.login FROM `reservations` as R INNER JOIN utilisateurs as U ON R.id_utilisateur=U.id WHERE R.id=".$id;
                $query= mysqli_query($db,$request);
                if(mysqli_num_rows($query)!=0){
                    $value=mysqli_fetch_assoc($query);
                    $titre=$value['titre'];
                    $desc=$value['description'];
                    $dated=$value['debut'];
                    $datef=$value['fin'];
                    $nom=$value['login'];
                }
                else{
                    $titre='';
                    $desc='';
                    $dated='';
                    $datef='';
                }
                echo "<h1>Résumé de l'évenement</h1><br>

                <div id='form-text'>Créé par<span>*</span> :</div><br>
                <div id='form-text'>".$nom."</div><br>

                <div id='form-text'>Titre<span>*</span> :</div><br>
                <div id='form-text'>".$titre."</div><br>
                    
                <div id='form-text' for='description'>Description<span>*</span> :</div><br>
                <div id='form-text'>".$desc."</div><br>
    
                <div id='form-text' for='heure-debut'>De<span>*<span> :</div><br>
                <div id='form-text'>".$dated."</div><br>
                
                <div id='form-text' for='heure-fin'>A <span>*<span> :</div><br>
                <div id='form-text'>".$datef."</div><br>
                
                <br><br>";
            }
            else{
                echo "<div id='form-text'>Il n'y a pas d'informations pour cette cellule</div>";
            }

        ?>
        </div>
        </section>
        </main>
    </body>
</html>

<?php 

}

else{
    header('location:connexion.php');
}

?>