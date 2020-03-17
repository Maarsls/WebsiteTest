<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrierung</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h1>Registreiere dich hier !!</h1>
</div>

<form method="post" action="register.php">
    <!-- Dadurch werden die Fehler angezeigt -->
    <?php include('errors.php');?>

    <div class="input_group">
        <label>Benutzername:</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input_group">
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input_group">
        <label>Passwort:</label>
        <input type="password" name="password_1">
    </div>
    <div class="input_group">
        <label>Bestätige dein Passwort:</label>
        <input type="password" name="password_2">
    </div>
    <div class="input_group">
        <button type="submit" name="register" class="btn">Registrieren</button>
    </div>
    <p>
        Bereits Registriert? <a href="login.php">Einloggen</a>
    </p>
</form>

</body>

</html>
<?php
