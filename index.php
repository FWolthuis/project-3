<?php

include "gameDatabaseConnect.php";

session_start();

if (isset($_POST['login-btn'])) {

    if (isset($_POST['username']) && isset($_POST['wachtwoord'])) {

        $input_username = $_POST['username'];
        $input_wachtwoord = sha1($_POST['wachtwoord']);

        $sql = "SELECT * FROM user WHERE username = '$input_username' AND wachtwoord = '$input_wachtwoord'";
        $result = $con->query($sql);


        if (mysqli_num_rows($result) > 0) {
            foreach ($result as $row) {

                $username = $row['username'];
                $wachtwoord = $row['wachtwoord'];

                if ($wachtwoord == $input_wachtwoord && $username == $input_username) {
                    $_SESSION['username'] = $username;
                    header("location: homepage.php");
                }
            }
        } else {
            echo "<script>window.addEventListener('DOMContentLoaded', (event) => { alert('Wrong login details!'); });  </script>";
        }
    }
}

if (isset($_POST['reg-btn'])) {

    $ID = NULL;
    $email = $_POST["regEmail"];
    $wachtwoord2 = sha1($_POST["regWachtwoord"]);
    $username2 = $_POST["regUsername"];

    $username3 = mysqli_real_escape_string($con, $username2);
    $query = mysqli_query($con, "SELECT username FROM user WHERE username='" . $username3 . "' ");

    if (mysqli_num_rows($query) != 0) {
        echo "<script> alert('Username already exists!'); </script>";
    } else {

        $sql = "INSERT INTO user (email, wachtwoord, username) VALUES ('" . $email . "', '" . $wachtwoord2 . "', '" . $username2 . "')";

        $mysqli = mysqli_query($con, $sql);

        echo "<script> alert('Registartion complete!'); </script>";
    }
}

?>


<!DOCTYPE html>
<meta charset="utf-8" name="viewport">
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="gameStylesheet.css">
    <link rel="shortcut icon" href="Images/logo-aot.png">
    <script>
        function naarRegister() {
            document.getElementById("inlog-inhoudJS").style.display = "none";
            document.getElementById("register-inhoudJS").style.display = "block";
        }

        function naarLogin() {
            document.getElementById("inlog-inhoudJS").style.display = "block";
            document.getElementById("register-inhoudJS").style.display = "none";
        }
    </script>

</head>

<body class="inlogBody">
    <div class="inlog-inhoud" id="inlog-inhoudJS">
        <h1 class="loginH1">L o g i n</h1>

        <br>
        <br>

        <form class="inlog" action="index.php" method="post">
            <label for="username">U s e r n a m e</label> <br>
            <input type="text" name="username" required>
            <br>
            <br>
            <label for="wachtwoord">P a s s w o r d</label> <br>
            <input type="password" name="wachtwoord" required>
            <br>
            <br>
            <input id="inlog-button" type="submit" value="L o g i n" name="login-btn">
            <br>
            <p><a onclick="naarRegister()">Click here to register</a></p>
        </form>
    </div>

    <div class="register-inhoud" id="register-inhoudJS" style="display: none;">
        <h1 class="loginH1">R e g i s t e r</h1>

        <br>
        <br>

        <form class="register" action="index.php" method="post">
            <label for="regUsername">U s e r n a m e</label> <br>
            <input type="text" name="regUsername" required>
            <br>
            <br>
            <label for="regEmail">E m a i l</label> <br>
            <input type="email" name="regEmail" required>
            <br>
            <br>
            <label for="regWachtwoord">P a s s w o r d</label> <br>
            <input type="text" name="regWachtwoord" required>
            <br>
            <br>
            <input id="register-button" type="submit" value="R e g i s t e r" name="reg-btn">
            <br>
            <p><a onclick="naarLogin()">Click here to login</a></p>
        </form>
    </div>
</body>
</html>