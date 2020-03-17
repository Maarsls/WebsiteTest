<?php include('server.php');

    // Sollte sich der Benutzer nicht eingeloggt haben, darf er keinen Zugriff auf diese Seite haben
    if(empty($_SESSION['username'])){
        header('location: login.php');
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title> Login </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    <a href="ueber_uns.html"><img class="logo"  src="http://placehold.it/200x75" alt="logo"/></a>
    <a href="#">Produkte</a>
    <a href="ueber_uns.html">Über Uns</a>
    <a href="#">Impressum</a>

    <button><a href="Warenkorb.html">Warenkorb</a></button>
</header>
<div id="Inhalt">
    <h1>Hallo, herzlich Willkommen.</h1>
    <?php if(isset($_SESSION['success'])): ?>
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <?php if(isset($_SESSION["username"])): ?>
        <p>Willkommen <strong><?php echo $_SESSION['username']?></strong></p>
        <p><a href="index.php?logout='1'" style="color: red;">Ausloggen</a></p>
    <?php endif ?>

</div>



<?php
?>

</body>
</html>
