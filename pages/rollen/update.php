<?php
include_once("../../Assets/header.php");
include_once("../../classes/rollenClass.php");
/* Checking if the form is submitted. If it is submitted it will update the database and redirect to the
index page. */
if (!empty($_POST)) {
    $rol = new rollen();
    $rol->update($_POST['rollen'], $_GET["id"]);
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/project-8---blauwe-loper/pages/rollen/'/>";
?>
    <div class="container">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-auto me-auto">
                    <!-- This is a function that gets the name of the person of the role that is being edited. -->
                    <?php $rol = new rollen();
                    echo "<div class='card-title me-auto'><h1>de roll van " .
                        $rol->getname($_GET["id"]) . " is met succses bewerkt</h1></div>";
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
?>

    <body>
        <div class="container">
            <form class="card" method="POST" action="">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-auto me-auto">
                            <div class="card-title">roll bewerken</div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <?php
                                /* Getting all the roles from the database and putting them in a
                                select menu. */
                                $rol = new rollen();
                                $rol->getallroll();
                                echo "<select class='form-select' name='rollen' multiple>";
                                foreach ($rol->allroll as $row) {
                                    echo "<option value=" . $row['RolID'] . ">" . $row['Naam'] . "</option>";
                                }
                                echo "</select>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </form>
        </div>
    <?php
}
    ?>