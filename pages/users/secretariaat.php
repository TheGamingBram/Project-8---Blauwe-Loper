<?php 
    session_start();
    include_once("../../classes/secretariaatFunctions.php");
?>
<!-- standaard html gegevens -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
    // hier wordt de Read functie uitgevoerd
        $rol = new secretariaat();
        $rol->read();
    ?>

    <?php
    // hier wordt gecheckt ofdat er een session gezet is, zo ja dan komt er een melding waarop een bericht met een berichttype getoont wordt  
    if(!empty($_SESSION['Message'])){
                echo "
                    <div class='mb-3'>
                        <div class='alert alert-".$_SESSION['MessageType']."' role='alert'>".
                            $_SESSION['Message']
                        ."</div>
                    </div>
                    ";
                unset($_SESSION['Message']);
                unset($_SESSION['MessageType']);
            }
    ?>    
<!-- hier wordt de leden tabel aangemaakt -->
    <div class="container d-flex justify-content-center">
    <table class="table table-dark table-striped w-75">
        <thead>
            <tr>
            <th scope="col">Voornaam</th>
            <th scope="col">Achternaam</th>
            <th scope="col">Telefoon nummer</th>
            <th scope="col">Email</th>
            <th scope="col">Wachtwoord</th>
            <th scope="col">Rollen</th>
            <th scope="col">acties</th>
            </tr>
        </thead>
        <tbody>
        
        <?php 
// hier wordt de real functie in een foreach gezet zodat elke lid in een aparte veld staat
            foreach ($rol->read as $row) {
            echo "<tr>";
            echo "<td>" . $row['Voornaam'] . "</td>";
            echo "<td>" . $row['Achternaam'] . "</td>";
            echo "<td>" . $row['Telefoonnummer'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>************</td>";
            echo "<td>" . $row['Rollen'] . "</td>";
            // hier worden de update en delete knoppen toegevoegd die uniek is voor elke lid 
            echo "<td> 
                    <a href='update.php? id=". $row['LidID'] ."' class='btn btn-warning'><i class='fa-solid fa-pen'></i></a>           
                    <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#melding". $row['LidID'] ."'><i class='fa-solid fa-trash'></i></button>
                    
                    <div class='modal fade text-danger' id='melding". $row['LidID'] ."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Weet u zeker dat u dit account wilt verwijderen?</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body text-dark'>
                            De account wordt pernament verwijderd als uw op verwijderen drukt!
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Annuleren</button>
                            <a type='button' href='delete.php? id=". $row['LidID'] ."' class='btn btn-danger'>Account verwijderen</a>
                        </div>
                        </div>
                    </div>
    </div>
                </td>";
            echo "</tr>";
            // hierboven wordt voor elke delete knop een unieke pop-up melding gemaakt die alleen maar verschijnt als iemand op de delete knop drukt
        }
               
        ?>
        </tbody>
    </table>   
    </div>
    <!-- hier staat de knop die je doorstuurd naar de create.php pagina -->
    <div class='container d-flex justify-content-center'>
        <a href='create.php' class='btn btn-primary'>Lid aanmaken</a>
    </div>

    
</body>
</html>