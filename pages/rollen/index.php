<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php
include_once("../../classes/rollenClass.php");
?>
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <div class="card-title">
                            <h1>admin overzicht</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <td>ID</td>
                        <td>Naam</td>
                        <td>achternaam</td>
                        <td>telefoonnummer</td>
                        <td>roll</td>
                        <td>roll toewijzen</td>
                        <td>roll wijzigen</td>
                    </thead>
                    <tbody>
                        <?php
                        $rol = new rollen();
                        $rol->read();
                        foreach ($rol->read as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['Lidnummer']; ?></td>
                                <td><?php echo $row['Voornaam']; ?></td>
                                <td><?php echo $row['Achternaam']; ?></td>
                                <td><?php echo $row['Telefoon nummer']; ?></td>
                                <td><?php $rol->getroll($row['Rollen']);
                                    foreach ($rol->roll as $row) {
                                        echo $row['naam'];
                                    }?></td>
                                <td><a href="" class="btn btn-warning">roll toewijzen</a></td>
                                <td><a href="" class="btn btn-danger">roll wijzigen</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php