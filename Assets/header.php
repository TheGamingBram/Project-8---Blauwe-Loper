<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>De Blauwe Loper</title>

    <link rel="icon" type="image/png" href="../Assets/IMG/Logo.png">
    <link rel="icon" type="image/png" href="./Assets/IMG/Logo.png">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/b-2.3.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/b-2.3.3/datatables.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.bootstrap5.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 
</head>

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="Index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <i class="fa-solid fa-chess-pawn"></i>
            <svg class="bi me-2" width="40" height="32"></svg>
            <span class="fs-4">Blauwe Loper</span>
        </a>

        <ul class="nav nav-pills">
            <?php
                if(isset($_SESSION["gebruikersid"]))
                {
            ?>
                    <li><a href="#"><?php echo $_SESSION["gebruikersid"];?></a></li>
                    <li><a href="includes../login/includes/logout.inc.php" class="header-login-a">UITLOGGEN</a></li>
                    <?php
                }
                else
                {
                    ?>
                    <li><a href="#">REGISTEER</a></li>
                    <li><a href="#" class="header-login-a">LOGIN</a></li>


            <?php
                }
            ?>
            
        </ul>
    </header>
</div>
<div class="b-example-divider"></div>