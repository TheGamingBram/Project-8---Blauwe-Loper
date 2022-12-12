<?php 
    session_start();
    include_once("../../classes/secretariaatFunctions.php");
    include_once("../../assets/header.php");

    // hier wordt gekeken ofdat de formulier al is ingevuld
    if(isset($_POST["submit"]))
    {
        // checkt opdat alle formulier gegevens wel ingevuld zijn
        if (!empty($_POST["Voornaam"]) && !empty($_POST["Achternaam"]) && !empty($_POST["Telefoonnummer"]) && !empty($_POST["Email"]) && !empty($_POST["Wachtwoord"]))
        {
            // stopt alle formulier data in variabelen
            $Voornaam = $_POST["Voornaam"];
            $Achternaam = $_POST["Achternaam"];
            $Telefoonnummer = $_POST["Telefoonnummer"];
            $Email = $_POST["Email"];
            $Wachtwoord = $_POST["Wachtwoord"];

            // hier wordt de Create functie uitgevoerd 
            $create = new secretariaat;
            $create->Create($Voornaam, $Achternaam, $Telefoonnummer, $Email, $Wachtwoord);

            // hier wordt een session aangemaakt 
            $_SESSION['Message'] = "Account is succesvol aangemaakt";
            $_SESSION['MessageType'] = "success";
            // stuurd je door naar de secretariaat.php pagina en sluit deze code af
            header("location: secretariaat.php");
            die();
        }
        // er gebeurd niks als de formulier nog niet is ingevuld
        else 
        {

        }
    }

?>
<!-- standaard html gegevens -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- hier wordt een bootstrap formulier gemaakt -->
    <div class="container d-flex justify-content-center">
    <form class="w-75" method="POST" action="create.php">
        <div class="row">
            <div class="col">
                <label for="Voornaam">Voornaam</label>
                <input type="text" class="form-control" placeholder="Voornaam" maxlength="255" name="Voornaam" required>
            </div>
            <div class="col">
                <label for="Achternaam">Achternaam</label>
                <input type="text" class="form-control" placeholder="Achternaam" maxlength="255" name="Achternaam" required>
            </div>
        </div>
        <div class="form-group">
            <label for="Telefoonnummer">Telefoonnummer</label>
            <input type="tel" class="form-control" placeholder="0600000000" maxlength="10" name="Telefoonnummer" required>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" placeholder="Email@voorbeeld.nl" maxlength="255" name="Email" required>
        </div>
        <div class="form-group">
            <label for="Wachtwoord">Wachtwoord</label>
            <input type="password" class="form-control" placeholder="" maxlength="255" name="Wachtwoord" required>
        </div>
        <!-- vult de post in en stuurd je terug naar dezelfde pagina -->
        <button class="btn btn-primary" type="submit" name="submit">Lid Aanmaken</button>
    </form>
    </div>
</body>
</html>