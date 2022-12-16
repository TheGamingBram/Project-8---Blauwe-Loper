<?php

if (isset($_POST["submit"])) {
    // Grabbing the data
    $email = $_POST["email"];
    $ww = $_POST["ww"];

    // Instantiate login Controller class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContrl($email, $ww);

    // Running error handles and user login
    $login->loginUser();

    // Going back to front page
    header("location: ../index.php?error=none");
}
