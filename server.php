<?php
    session_start();
    $username="";
    $email="";
    $errors=array();

    //Mit der Datenbank verbinden
    $db=mysqli_connect('localhost','root','','registrierung');

    //wenn der Registrieren Button gedrückt wird
    if(isset($_POST['register'])){
        $username=mysqli_real_escape_string($db,$_POST['username']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $password_1=mysqli_real_escape_string($db,$_POST['password_1']);
        $password_2=mysqli_real_escape_string($db,$_POST['password_2']);

        //Überprüfen ob alle Felder ausgefüllt wurden
        if(empty($username)){
            array_push($errors,"Sie müssen einen Benutzernamen angeben");
        }
        if(empty($email)){
            array_push($errors,"Sie müssen eine E-Mail Adresse angeben");
        }
        if(empty($password_1)){
            array_push($errors,"Sie müssen ein Passwort angeben");
        }

        if($password_1 != $password_2){
            array_push($errors,"Die beiden Passwörter stimmen nicht überein");
        }

        //Wenn es keine Fehler gibt
        if(count($errors)==0){
            $password=md5($password_1); // Wir verschlüsseln das Passwort bevor wir es auf die Datenbank laden (Sicherheit)
            $sql="INSERT INTO benutzer (username,email,password) VALUES ('$username','$email','$password')";
            mysqli_query($db,$sql);
            $_SESSION['username']=$username;
            $_SESSION['success']="Sie haben sich erfolgreich eingeloggt !";
            header('location: userzone.php'); //zur Homepage weiterleiten
        }
    }

    //Einloggen von Login page
    if(isset($_POST['login'])){
        $username=mysqli_real_escape_string($db,$_POST['username']);
        $password=mysqli_real_escape_string($db,$_POST['password']);

        //Überprüfen ob alle Felder ausgefüllt wurden
        if(empty($username)){
            array_push($errors,"Sie müssen einen Benutzernamen angeben");
        }
        if(empty($password)){
            array_push($errors,"Sie müssen ein Passwort angeben");
        }

        if(count($errors)==0){
            $password = md5($password); // Passwort wieder entschlüsseln
            $query = "SELECT * FROM benutzer WHERE username='$username' and password='$password'";
            $result= mysqli_query($db,$query);
            if(mysqli_num_rows($result) == 1){
                // Benutzer einloggen
                $_SESSION['username']=$username;
                $_SESSION['success']="Sie haben sich erfolgreich eingeloggt !";
                header('location: userzone.php');
            }else{
                array_push($errors,"Benutzername oder/und Passwort sind falsch");
            }
        }
    }

    //Ausloggen
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');

}

?>
