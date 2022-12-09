<?php 
    session_start();
    include_once("../../classes/secretariaatFunctions.php");
    
    $ID = $_GET['id'];
    $delete = new secretariaat();
    $delete->delete($ID); 
    
    $_SESSION['Message'] = "Lid is succesvol verwijderd";
    $_SESSION['MessageType'] = "success";
    header("location: secretariaat.php");
    die();
?>