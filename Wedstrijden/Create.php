<?php 
    session_start();

    include("../assets/connect.php");

    $loginrole = 3;
    $AdminRights = 2;

    if($loginrole < $AdminRights){
        header("Location: Index.php");
    }

    $ErrorMessage = array();

    $DB_Connection = new connection;

    $SQL_User_Request = "
    Select
        blauweloper.leden.LidID,
        blauweloper.leden.Voornaam,
        blauweloper.leden.Achternaam,
        blauweloper.leden.Rollen
    From
        blauweloper.leden
    ";

    $SQL_User_Responce = $DB_Connection->select($SQL_User_Request);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST['Lid1Select'])){
            $Message = "Er is niemand geselecteerd bij Lid 1";
            array_push($ErrorMessage, $Message);
        }
        if(empty($_POST['Lid2Select'])){
            $Message = "Er is niemand geselecteerd bij Lid 2";
            array_push($ErrorMessage, $Message);
        }
        if(empty($_POST['ScheidsSelect'])){
            $Message = "Er is niemand geselecteerd bij Scheidsrechter";
            array_push($ErrorMessage, $Message);
        }

        if($_POST['Lid1Select'] == $_POST['Lid2Select']){
            $Message = "1 lid kan niet tegen zichzelf.";
            array_push($ErrorMessage, $Message);
        }

        if($_POST['Lid1Select'] == $_POST['ScheidsSelect'] || $_POST['Lid2Select'] == $_POST['ScheidsSelect']){
            $Message = "Een lid kan niet zelf een wedrijd spelen en een scheidsrechter zijn voor een wedstrijd.\r\n";
            array_push($ErrorMessage, $Message);
        }

        if(empty($ErrorMessage)){
            $SQL_Wed_insert_query = "INSERT INTO wedstrijden (`Lid1`, `Lid2`, `Scorelid1`, `Scorelid2`, `SchijdsrechterID`) VALUES ('".$_POST['Lid1Select']."','".$_POST['Lid2Select']."','0','0','".$_POST['ScheidsSelect']."')";
            if($DB_Connection->insert($SQL_Wed_insert_query)){
                $_SESSION['Message'] = "Wedstrijd toegevoegd!";
                $_SESSION['MessageType'] = "success";

                header("Location: Index.php");
            }
        }
    }

    include("../assets/header.php");
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Wedstrijd aanmaken
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Lid 1</label>
                    <select id="Lid1Select" name="Lid1Select" class="form-control" aria-label="Default select example" required>
                        <option value=''></option>
                        <?php 
                            foreach ($SQL_User_Responce as $row) {
                                echo "<option value='".$row['LidID']."'>".$row['Voornaam']." ".$row['Achternaam']."</option>";
                            }
                        ?>
                    </select>
                    <script>
                        $('#Lid1Select').selectize();
                    </script>
                </div>
                <div class="mb-3">
                    <label class="form-label">Lid 2</label>
                    <select id="Lid2Select" name="Lid2Select" class="form-control" aria-label="Default select example" required>
                        <option value=''></option>
                        <?php 
                            foreach ($SQL_User_Responce as $row) {
                                echo "<option value='".$row['LidID']."'>".$row['Voornaam']." ".$row['Achternaam']."</option>";
                            }
                        ?>
                    </select>
                    <script>
                        $('#Lid2Select').selectize();
                    </script>
                </div>
                <div class="mb-3">
                    <label class="form-label">Scheidsrechter</label>
                    <select id="ScheidsSelect" name="ScheidsSelect" class="form-control" aria-label="Default select example" required>
                        <option value=''></option>
                        <?php 
                            foreach ($SQL_User_Responce as $row) {
                                if($row['Rollen'] >= 2){
                                    echo "<option value='".$row['LidID']."'>".$row['Voornaam']." ".$row['Achternaam']."</option>";
                                }
                            }
                        ?>
                    </select>
                    <script>
                        $('#ScheidsSelect').selectize();
                    </script>
                </div>
                <div class='mb-3'>
                    <button type="submit" class="btn btn-success">Aanmaken</button>
                </div>
                <?php 
                    if(!empty($ErrorMessage)){
                        echo "
                            <div class='mb-3'>
                                <div class='alert alert-danger' role='alert'>";
                                    foreach ($ErrorMessage as $value) {
                                        echo $value . '<br>';
                                    }
                                echo "</div>
                            </div>
                        ";
                    }
                ?>
            </form>
        </div>
    </div>
</div>