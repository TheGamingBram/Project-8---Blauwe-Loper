<?php 
    session_start();
    include_once("../../classes/secretariaatFunctions.php");

    if(isset($_POST['submit']))
    {
        $ID = $_GET['id'];
        $Voornaam = $_POST['Voornaam'];
        $Achternaam = $_POST['Achternaam'];
        $TelefoonNummer = $_POST['Telefoonnummer'];
        $Email = $_POST['Email'];
        $Wachtwoord = $_POST['Wachtwoord'];

        $update = new secretariaat();
        $update->Update($Voornaam, $Achternaam, $TelefoonNummer, $Email, $Wachtwoord, $ID);


        $_SESSION['Message'] = "Account is succesvol aangepast";
        $_SESSION['MessageType'] = "success";
        header('location: secretariaat.php');
        die();
    }
    else
    {

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        $ID = $_GET['id'];
        $rol = new secretariaat();
        $rol->Getdata($ID);
        foreach($rol->data as $row)
        {
            $Voornaam = $row['Voornaam'];
            $Achternaam = $row['Achternaam'];
            $TelefoonNummer = $row['Telefoonnummer'];
            $Email = $row['Email'];
        }
?>
    <div class="container d-flex justify-content-center">
    <form class="w-75" method="POST" action="update.php? id=<?php echo $ID; ?>">
        <div class="row">
            <div class="col">
                <label for="Voornaam">Voornaam</label>
                <input type="text" class="form-control" placeholder="<?php echo $Voornaam ?>" maxlength="255" name="Voornaam" required>
            </div>
            <div class="col">
                <label for="Achternaam">Achternaam</label>
                <input type="text" class="form-control" placeholder="<?php echo $Achternaam ?>" maxlength="255" name="Achternaam" required>
            </div>
        </div>
        <div class="form-group">
            <label for="Telefoonnummer">Telefoonnummer</label>
            <input type="tel" class="form-control" placeholder="<?php echo $TelefoonNummer ?>" maxlength="10" name="Telefoonnummer" required>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" placeholder="<?php echo $Email ?>" maxlength="255" name="Email" required>
        </div>
        <div class="form-group">
            <label for="Wachtwoord">Wachtwoord</label>
            <input type="password" class="form-control" placeholder="*********" maxlength="255" name="Wachtwoord" required>
        </div>
        <a class="btn btn-secondary" href="secretariaat.php" type="button" name="Annuleren">Annuleren</a>
        <button class="btn btn-primary" type="submit" name="submit">Lid Aanmaken</button>
        
    </form>
    </div>    
</body>
</html>