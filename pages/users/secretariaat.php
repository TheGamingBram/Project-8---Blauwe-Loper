<?php 
    include_once("../../classes/secretariaatFunctions.php");
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
            </tr>
        </thead>
        <tbody>
        
        <?php 

            foreach ($rol->read as $row) {
            echo "<tr>";
            echo "<td>" . $row['Voornaam'] . "</td>";
            echo "<td>" . $row['Achternaam'] . "</td>";
            echo "<td>" . $row['Telefoon nummer'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Wachtwoord'] . "</td>";
            echo "<td>" . $row['Rollen'] . "</td>";
            echo "</tr>";
        }
               
        ?>
        </tbody>
    </table>
    </div>
<?php    

?>
</body>
</html>