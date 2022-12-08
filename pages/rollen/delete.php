<?php
include_once("../../Assets/header.php");
include_once("../../classes/rollenClass.php");

/* It's a PHP script that updates the role of a user. */
/* afther that it redirects to the index page . */
$rol = new rollen();
$rol->update(1, $_GET["id"]);
echo "<meta http-equiv='refresh' content='1;url=http://localhost/project-8---blauwe-loper/pages/rollen/'/>";
?>
<div class="container">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-auto me-auto">
                <?php $rol = new rollen();
                echo "<div class='card-title me-auto'><h1>" .
                    $rol->getname($_GET["id"]) . " is nu gedegradeert naar lid</h1></div>";
                ?>
            </div>
        </div>
    </div>
</div>