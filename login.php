<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Einloggen</title>
</head>
<body>
<div class="header">
    <h1>Logge dich ein</h1>
    <link rel="stylesheet" type="text/css" href="style.css">
</div>

<form method="post" action="login.php">
    <!-- Dadurch werden die Fehler angezeigt -->
    <?php include('errors.php');?>

    <div class="input_group">
        <label>Benutzername:</label>
        <input type="text" name="username">
    </div>
    <div class="input_group">
        <label>Passwort:</label>
        <input type="password" name="password">
    </div>
    <div class="input_group">
        <button type="submit" name="login" class="btn">Einloggen</button>
    </div>
    <p>
        Noch nicht Registriert? <a href="register.php">Registrieren</a>
    </p>
</form>

</body>

</html>
<?php