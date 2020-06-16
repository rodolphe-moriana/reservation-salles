<?php

session_start();

?>


<html>
    <head>
        <title>Planning</title>
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

            <section class="main-article form-input" id="main-article">

            <table id='table-livre'><thead><th colspan='8' id='thead-txt'>Planning de la semaine</th></thead>
            <tbody>
            
            <?php

                    $jour=1;
                    $heure=8;

                    while(($heure>7) && ($heure<19)){
                        echo '<tr>';
                        while(($jour>0) && ($jour<6)){
                            echo '<td id='.$jour.'-'.$heure.'></td>';
                            $jour++;
                        }
                        $jour=1;
                        echo '</tr>';
                        $heure++;
                    }

            ?>

            </tbody>
            </table>
        
        
            </section>
        </main>

</body>
</html>