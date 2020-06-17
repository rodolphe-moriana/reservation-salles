<?php

session_start();

?>


<html>
    <head>
        <title>Profil</title>
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
            <section class="main-article form-input" id="profil-article">
         

<form class="form-style" id="form-profil" method="POST">

<?php
 if(isset($_SESSION['login'])){

$con = mysqli_connect('localhost','root','','discussion');
$query = "SELECT * FROM `utilisateurs` WHERE  `login`='$_SESSION[login]'";
$result2 = mysqli_query($con, $query);

$value = mysqli_fetch_assoc($result2);

if(isset($_POST['submit']) && (isset($_POST['login'])) && (isset($_POST['password'])))
{
$login = $_POST['login'];
$password = $_POST['password'];

if(empty($login) || empty($password))
{
    echo "Veuillez saisir tous les champs";
}else
{

    $con = mysqli_connect('localhost','root','','discussion');

    $sql = "UPDATE `utilisateurs` SET `login`='$login',`password`='$password' WHERE login = '$_SESSION[login]'";
    $result = mysqli_query($con, $sql);


   
    header("location:logout.php");


}
}


?>

<h1>Modifier vos informations</h1><br>
<label for="login">Nouveau login</label><br>
<input id="form-text" type="text" value="<?php echo $value['login']?>"name="login">

<label for="password">Nouveau password</label><br>
<input id="form-text" type="password" value="<?php echo $value['password']?>" name="password">
<br/><br/>

<input id="button-valider" type="submit" name="submit" value="Valider">
</form>
</section>
        </main>
    </body>
</html>

<?php
}else header("location:logout.php");
?>