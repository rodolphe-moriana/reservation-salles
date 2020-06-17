<?php

session_start();

?>


<html>
    <head>
        <title>Planning</title>
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

            <section class="main-article form-input" id="main-article">

            <table id='table-livre'><thead><th colspan='8' id='thead-txt'>Planning de la semaine  
            
                <?php 
                       
                echo date('W');

                ?>
             
                </th>
                <tr>
                <th id='inv'></th><th>Lundi</th><th>Mardi</th><th>Mercredi</th><th>Jeudi</th><th>Vendredi</th>
            </thead>
            <tbody>
            
            <?php

                    $jour=0;
                    $heure=8;

                    $db = mysqli_connect("localhost","root","","reservationsalles");

                    while(($heure>7) && ($heure<19)){
                        echo "<tr><td class='centre_txt'>".$heure;
                        while(($jour>=0) && ($jour<5)){
                            $numSemaine= date('W')-2;
                            $timeStart = strtotime("First sunday January 2020 + ".$numSemaine." Week +". ($jour+1) ." day");
                            $dateStart = date('Y-m-d',$timeStart);
                            $date=$dateStart.' '.$heure.':00';
                            $request="SELECT R.*,U.login FROM `reservations` as R INNER JOIN utilisateurs as U ON R.id_utilisateur=U.id WHERE `debut`='$date'";
                            $query= mysqli_query($db,$request);
                                if(mysqli_num_rows($query)!=0){
                                    $cont=mysqli_fetch_assoc($query);
                                    echo "<td class='centre_txt'><a href='http://localhost/reservation-salles/reservation.php?id=". $cont['id'] ."'><p class='text_planning'>".$cont['login']."</p><br><p class='text_planning'>".$cont['titre'].'</p></a></td>';
                                }
                                else{
                                    echo "<td><a href='reservation-form.php'><p class='case_vide'>Lien de résa</p></a></td>";
                                }
                            $jour++.-1;
                        }
                        $jour=0;
                        echo '</td></tr>';
                        $heure++;
                    }

            ?>

            </tbody>
            </table>
        
        
            </section>
        </main>

</body>
</html>