<?php
include_once("../../classes/rollenClass.php");
include_once("../../Assets/header.php");
?>

<body>
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
                        <td>roll wijzigen</td>
                        <td>roll verwijderen</td>
                    </thead>
                    <tbody>
                        <?php
                        $rol = new rollen();
                        $rol->read();
                        foreach ($rol->read as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row['LidID']; ?></td>
                                <td><?php echo $row['Voornaam']; ?></td>
                                <td><?php echo $row['Achternaam']; ?></td>
                                <td><?php echo $row['Telefoonnummer']; ?></td>
                                <td><?php echo $rol->getroll($row['Rollen']); ?></td>
                                <?php echo "<td><a href='update.php?id=" . $row['LidID'] . "' class='btn btn-warning'>roll wijzigen</a></td>"; ?>
                                <?php echo "<td><a href='delete.php?id=" . $row['LidID'] . "' class='btn btn-danger'>roll verwijderen</a></td>"; ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>