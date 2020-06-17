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

                <div>Créé par<span>*</span> :</div><br>
                <div>".$nom."</div>

                <div>Titre<span>*</span> :</div><br>
                <div>".$titre."</div>
                    
                <div for='description'>Description<span>*</span> :</div><br>
                <div>".$desc."</div>
    
                <div for='heure-debut'>De<span>*<span> :</div>
                <div>".$dated."</div>
                
                <div for='heure-fin'>A <span>*<span> :</div>
                <div>".$datef."</div>
                
                <br><br>";
            }
            else{
                echo "<div>Il n'y a pas d'informations pour cette cellule</div>";
            }

        ?>

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