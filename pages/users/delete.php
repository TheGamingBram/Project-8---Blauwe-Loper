<?php 
    session_start();
    include_once("../../classes/secretariaatFunctions.php");
    
    // hier wordt de Delete functie uitgevoerd 
    $ID = $_GET['id'];
    $delete = new secretariaat();
    $delete->delete($ID); 
    
    // hier wordt een session aangemaakt
    $_SESSION['Message'] = "Lid is succesvol verwijderd";
    $_SESSION['MessageType'] = "success";
    // stuurd je door naar de secretariaat.php pagina en sluit de code hier af
    header("location: secretariaat.php");
    die();
?>