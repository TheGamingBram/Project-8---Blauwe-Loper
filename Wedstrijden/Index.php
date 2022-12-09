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
                    <div class='alert alert-".$_SESSION['MessageType']."' role='alert'>".
                        $_SESSION['Message']
                    ."</div>
                </div>
                ";
            unset($_SESSION['Message']);
            unset($_SESSION['MessageType']);
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
                            echo $row["Wedstrijdnummer"];
                        echo "</td>";
                        echo "<td>";
                            echo $row["Lid1Voornaam"] . " " . $row["Lid1Achternaam"];
                        echo "</td>";
                        echo "<td>";
                            echo $row["Lid2Voornaam"] . " " . $row["Lid2Achternaam"];
                        echo "</td>";
                        echo "<td>";
                            echo $row["Scorelid1"] . "-" . $row["Scorelid2"];
                        echo "</td>";
                        echo "<td>";
                            echo $row["SchijdsVoornaam"] . " " . $row["SchijdsAchternaam"];
                        echo "</td>";
                        echo "<td>";
                            echo "<a class='btn btn-warning' href='#' role='button'><i class='fa-solid fa-pen'></i></a>";
                            echo "&nbsp;";
                            echo "<button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#Wedstr".$row["Wedstrijdnummer"]."'><i class='fa-solid fa-trash'></i></button>";

                            echo '
                                <div class="modal fade" id="Wedstr'.$row["Wedstrijdnummer"].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Weet u het zeker?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="wedstr_data.php">
                                            <input type="hidden" name="DelID" value="'.$row["Wedstrijdnummer"].'">
                                            <input type="hidden" name="Type" value="delInfo">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit"  class="btn btn-danger">Verwijderen</button>
                                            </div>
                                        </form>
                                        
                                    </div>
                                    </div>
                                </div>
                            ';
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
            ],
            dom: 'Bfrtip',
            buttons: [
                {
                    className: 'btn btn-success',
                    text: "Wedstrijd Aanmaken",
                    action: function ( e, dt, node, config ) {
                        window.location = 'Create.php';
                    },
                    titleAttr: 'Refresh Log'
                }
            ]
        });
    });
</script>