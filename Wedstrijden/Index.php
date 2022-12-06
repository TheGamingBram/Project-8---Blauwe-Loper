<?php 
    include("../assets/connect.php");
    include("../assets/header.php");


    $loginrole = 3;

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
        blauweloper.leden On blauweloper.leden.Lidnummer = blauweloper.wedstrijden.lid1 Inner Join
        blauweloper.leden leden1 On leden1.Lidnummer = blauweloper.wedstrijden.lid2 Inner Join
        blauweloper.leden leden2 On leden2.Lidnummer = blauweloper.wedstrijden.schijdsrechterid
    ";

    $sql_responce = $DB_Connection->select($sql_request);

    //$DB_Connection->prettyprint($sql_responce);
?>
<html>
    <body>
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <i class="fa-solid fa-chess-pawn"></i>
                <svg class="bi me-2" width="40" height="32"></svg>
                <span class="fs-4">Simple header</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
            </ul>
            </header>
        </div>
        <div class="b-example-divider"></div>
        <div class="container"> 
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
                            echo "</td>";
                        echo "</tr>";
                     }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
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
                    if($loginrole != 3){
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