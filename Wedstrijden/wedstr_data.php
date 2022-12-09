<?php
    session_start();
    include("../assets/connect.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if($_POST['Type'] == "delInfo"){
            $DB_Connection = new connection;

            $sql_Delete_Query = "DELETE FROM `wedstrijden` WHERE `wedstrijden`.`Wedstrijdnummer` = ".$_POST['DelID']."";
            if($DB_Connection->delete($sql_Delete_Query)){
                $_SESSION['Message'] = "Data is verwijderd!";
                $_SESSION['MessageType'] = "success";
                header("Location: Index.php");
            }else{
                $_SESSION['Message'] = "Er is iets mis gegaan!";
                $_SESSION['MessageType'] = "danger";
                header("Location: Index.php");
            }
        }
        

    }else{
        $_SESSION['Message'] = "Er is iets mis gegaan!";
        $_SESSION['MessageType'] = "danger";
        header("Location: Index.php");
    }
?>