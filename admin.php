<?php

session_start();

if(!isset($_SESSION['login'])){
    header("location:connexion.php");
}

else{

?>

<html>
    <head>
        <title>Admin</title>
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

            <section class="info2">
<?php

if(($_SESSION['login'])=='admin'){

    $db = mysqli_connect("localhost","root","","discussion");

                $request="SELECT * FROM utilisateurs";
                $query=mysqli_query($db,$request);
                
                ?>
                <table>
                    <thead>
                        <tr><th colspan="3" id="admin-title">Administration</th></tr>
                        <tr id="admin-2title">
                            <th>ID</th>
                            <th>Identifiant</th>
                            <th>Mot de passe</th>
                        </tr>
                    </thead>
                    <tbody><?php

                while($value=mysqli_fetch_assoc($query)){?>
                        <tr>
                            <td id="ID-admin"><?php echo $value['id'] ?></td>
                            <td id="ID-admin"><?php echo $value['login'] ?></td>
                            <td id="ID-admin"><?php echo $value['password']?></td>
                        </tr><?php } ?>
                    </tbody>
                </table>

<?php
}

else{
    header("location:index.php");
}


?>

</section>
        </main>
</body>

</html>

<?php
}
?>


                