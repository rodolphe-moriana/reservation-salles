<?php

session_start();

?>


<html>
    <head>
        <title>Inscription</title>
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

<form class="form-style" id="form-inscri" method="post" action="">
<?php


if ((isset($_POST['login'])) && (isset($_POST['password'])) && (isset($_POST['conpassword'])))
{
if ((!empty($_POST['login'])) && (!empty($_POST['password'])) && (!empty($_POST['conpassword'])))
{


if (($_POST['password']) == ($_POST['conpassword'])){

	$con = mysqli_connect('localhost','root','');


if(! $con){
	die("Error  : ". mysql_error());
}

mysqli_select_db($con,'reservationsalles');

$sql_query = "SELECT `login` FROM `utilisateurs` WHERE login='$_POST[login]'";
$result = mysqli_query($con,$sql_query);
$login=$_POST['login'];

if(mysqli_num_rows($result) > 0){
    echo 'Un membre portant le login ' . $login . ' existe déjà!';
}

else{

$sql = "INSERT INTO `utilisateurs`(`login`, `password`) VALUES('$_POST[login]','$_POST[password]')";

if (!mysqli_query($con,$sql))
{
	die("Impossible d'ajouter cet enregistrement : " . mysql_error());
}


header("location:connexion.php");
}
mysqli_close($con);

}else echo "<span>Les mots de passe doivent être identiques</span> <br>";

}else echo "<span>Veuillez saisir tous les champs</span> <br>";


}




?>
<h1>Inscription</h1><br>
<label for="login">Votre Login<span>*</span> :</label><br>
<input id="form-text" type="text" name="login">
    
<label for="password">Votre mot de passe<span>*</span> :</label><br>
<input id="form-text" type="password" name="password">

<label for="conpassword">Confirmer votre mot de passe<span>*</span> :</label><br>
<input id="form-text" type="password" name="conpassword">

<br><br>

<input id="button-valider" type="submit" value="S'inscrire" name="submit">
</form>
</section>
    </main>

        </body>
</html>