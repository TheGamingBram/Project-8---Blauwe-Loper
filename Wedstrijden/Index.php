<?php 
    session_start();

    include("../assets/connect.php");
    include("../assets/header.php");


    $loginrole = 3;
    $AdminRights = 2;

    $DB_Connection = new connection;

    $sql_request = "
    Select
        blauweloper.wedstrijden.*,
        blauweloper.leden.Voornaam As Lid1Voornaam,
        blauweloper.leden.Achternaam As Lid1Achternaam,
        leden1.Voornaam As Lid2Voornaam,
        leden1.Achternaam As Lid2Achternaam,
        leden2.Voornaam As SchijdsVoornaam,
        leden2.Achternaam As SchijdsAchternaam
    From
        blauweloper.wedstrijden Inner Join
        blauweloper.leden On blauweloper.leden.LidID = blauweloper.wedstrijden.Lid1 Inner Join
        blauweloper.leden leden1 On leden1.LidID = blauweloper.wedstrijden.Lid2 Inner Join
        blauweloper.leden leden2 On leden2.LidID = blauweloper.wedstrijden.SchijdsrechterID
    ";

    $sql_responce = $DB_Connection->select($sql_request);    

    //$DB_Connection->prettyprint($_SESSION);
?>
<div class="container"> 
    <?php 
        if(!empty($_SESSION['Message'])){
            echo "
                <div class='mb-3'>
                    <div class='alert alert-success' role='alert'>".
                        $_SESSION['Message']
                    ."</div>
                </div>
                ";
            unset($_SESSION['Message']);
        }
    ?>
    <table id="table_wedstrijd" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lid 1</th>
                <th>Lid 2</th>
                <th>Score</th>
                <th>Scheidsrechter</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($sql_responce as $row) {
                    echo "<tr>";
                        echo "<td>";
                            echo $row["wedstrijdnummer"];
                        echo "</td>";
                        echo "<td>";
                            echo $row["Lid1Voornaam"] . " " . $row["Lid1Achternaam"];
                        echo "</td>";
                        echo "<td>";
                            echo $row["Lid2Voornaam"] . " " . $row["Lid2Achternaam"];
                        echo "</td>";
                        echo "<td>";
                            echo $row["scorelid1"] . "-" . $row["scorelid2"];
                        echo "</td>";
                        echo "<td>";
                            echo $row["SchijdsVoornaam"] . " " . $row["SchijdsAchternaam"];
                        echo "</td>";
                        echo "<td>";
                            echo "<a class='btn btn-warning' href='#' role='button'><i class='fa-solid fa-pen'></i></a>";
                            echo "&nbsp;";
                            echo "<a class='btn btn-danger' href='#' role='button'><i class='fa-solid fa-trash'></i></a>";
                        echo "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#table_wedstrijd').DataTable({
            "paging": false,
            columnDefs: [
                {
                    target: 0,
                    visible: false,
                    searchable: false
                }<?php 
                    if($AdminRights >= $loginrole){
                        echo "
                            ,{
                                target: -1,
                                visible: false,
                                searchable: false
                            }
                        ";
                    }
                ?> 
            ]
        });
    });
</script>