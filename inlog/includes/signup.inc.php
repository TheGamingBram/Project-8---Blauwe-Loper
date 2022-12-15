<?php

if(isset($_POST["submit"]))
{
    // Grabbing the data
    $lidiID = $_POST["lidid"];
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $email = $_POST["email"];
    $ww = $_POST["ww"];
    $wwherhaal = $_POST["wwherhaal"];
    $telefoonnummer = $_POST["telefoonnummer"];

    // Instatntiate Signup Controller class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContrl($lidID, $voornaam, $achternaam, $email, $ww, $wwherhaal, $telefoonnummer);


    
    // Running error handles and user signup
    $signup->signupUser();

    // Going back to front page
    header("location: ../index.php?error=none");

}