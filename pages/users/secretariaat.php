<?php 
    include_once("../../classes/secretariaatFunctions.php");
?>
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
    <h1>hello world</h1>
    
    <?php
        $rol = new secretariaat();
        $rol->read();
    
    ?>
    

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

            foreach ($rol->read as $row) {
            echo "<tr>";
            echo "<td>" . $row['Voornaam'] . "</td>";
            echo "<td>" . $row['Achternaam'] . "</td>";
            echo "<td>" . $row['Telefoonnummer'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>************</td>";
            echo "<td>" . $row['Rollen'] . "</td>";
            echo "<td> 
                    <a href='update.php? id=". $row['LidID'] ."' class='btn btn-warning'><i class='fa-solid fa-pen'></i></a> 
                    <a href='delete.php? id=". $row['LidID'] ."' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a>                     
                </td>";
            echo "</tr>";
        }
               
        ?>
        </tbody>
    </table>   
    </div>
    <div class="container d-flex justify-content-center">
        <a href="create.php" class="btn btn-primary">Lid aanmaken</a>
    </div>









<!-- Modal HTML -->
  
</body>
</html>