<?php

session_start();

?>


<html>
    <head>
        <title>Connexion</title>
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

    <form class="form-style" id="form-connexion" method="post" action="">
    <?php



if ((isset($_POST['login'])) && (isset($_POST['password'])))
{
if ((!empty($_POST['login'])) && (!empty($_POST['password'])))
{



    $con = mysqli_connect('localhost','root','','discussion');


if(! $con){
	die("Error  : ". mysql_error());
}


$sql = "SELECT * FROM `utilisateurs` WHERE  `login`='$_POST[login]'&&`password`='$_POST[password]'";
$result = mysqli_query($con, $sql);
if ($result)
{
  $row = mysqli_num_rows($result);

  if ($row)
    {
        $_SESSION['login']=$_POST['login'];
        $login=$_SESSION['login'];
        header("location:index.php");
    }else echo "Login ou mot de passe incorrect";

}

}else echo "<span>Veuillez remplir tous les champs</span><br>";

}
?>
        <h1>Connexion</h1><br>
        <label for="login">Login</label><br>
        <input id="form-text" type="text" name="login">

        <label for="password">Mot de passe</label><br>
        <input id="form-text" type="password" name="password"><br><br>

        <input id="button-valider" type="submit" value="Se connecter" name="submit">
    </form>
    </section>
</main>
    </body>
</html>