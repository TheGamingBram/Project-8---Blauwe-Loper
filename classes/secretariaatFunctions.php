<?php

    class secretariaat
    {

        public $read;
        public $create;
        public $data;
        public $update;

        public function __construct()
        {
            include_once("../../assets/connect.php");
            include_once("../../assets/header.php");
        }

        public function Create($Voornaam, $Achternaam, $Telefoonnummer, $Email, $Wachtwoord)
        {
            $action = new connection;
            $this->create = $action->insert("INSERT INTO `leden` (`Voornaam`, `Achternaam`, `Telefoonnummer`, `Email`, `Wachtwoord`, `Rollen`) VALUES ( '". $Voornaam ."', '". $Achternaam ."', '". $Telefoonnummer ."', '". $Email ."', '". $Wachtwoord ."', '1')");
        }

        public function Read()
        {
            $action = new connection;
            $this->read = $action->select("SELECT * FROM `leden`");
        }

        public function Getdata($ID)
        {
            $action = new connection;
            $this->data = $action->select("SELECT * FROM `leden` WHERE `lidID` = $ID");
        }

        public function Update($Voornaam, $Achternaam, $Telefoonnummer, $Email, $Wachtwoord, $ID)
        {
            $action = new connection;
            $this->update = $action->update("UPDATE `leden` SET `Voornaam` = '$Voornaam', `Achternaam` = '$Achternaam', `Telefoonnummer` = '$Telefoonnummer', `Email` = '$Email', `Wachtwoord` = '$Wachtwoord' WHERE `LidID` = '$ID'");
        }

        public function Delete()
        {

        }

    }

?>