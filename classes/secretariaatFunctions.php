<?php

    class secretariaat
    {

        public $read;
        public $create;

        public function __construct()
        {
            include_once("../../assets/connect.php");
            include_once("../../assets/header.php");
        }

        public function Create($Voornaam, $Achternaam, $Telefoonnummer, $Email, $Wachtwoord)
        {
            $action = new connection;
            $this->create = $action->insert("INSERT INTO leden (Voornaam, Achternaam, Telefoon nummer, Email, Wachtwoord, Rollen) VALUES (" . $Voornaam . "," . $Achternaam. "," . $Telefoonnummer . "," . $Email . "," . $Wachtwoord . "," . 1 . ")");
        }

        public function Read()
        {
            $action = new connection;
            $this->read = $action->select("select * from leden");
        }

        public function ReadPull()
        {
            $action = new connection;
            $this->read = $action->select("select * from leden");
        }

        public function Update()
        {

        }

        public function Delete()
        {

        }

    }

?>