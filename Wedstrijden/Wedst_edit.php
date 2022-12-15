<?php
    session_start();
    $_SESSION['Message'] = "Deze funcite is in onderhoud!";
    $_SESSION['MessageType'] = "warning";
    header("Location: Index.php");
?>