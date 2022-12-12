<?php
// class secretariaat wordt hier aan gemaakt met alle functies van de Users CRUD
    class secretariaat
    {
// variabelen die worden gebruikt om data in op te slaan
        public $read;
        public $create;
        public $data;
        public $update;
        public $delete;
// function wordt automatisch uitgevoerd en include de database connectie en de header.php
        public function __construct()
        {
            include_once("../../assets/connect.php");
            include_once("../../assets/header.php");
        }
// bij deze functie worden de variabelen van de users/create.php ingevuld en in een query gestopt
        public function Create($Voornaam, $Achternaam, $Telefoonnummer, $Email, $Wachtwoord)
        {
            // maakt een nieuwe connectie naar de database en voert de query uit en stopt hem in de $create variabel
            $action = new connection;
            $this->create = $action->insert("INSERT INTO `leden` (`Voornaam`, `Achternaam`, `Telefoonnummer`, `Email`, `Wachtwoord`, `Rollen`) VALUES ( '". $Voornaam ."', '". $Achternaam ."', '". $Telefoonnummer ."', '". $Email ."', '". $Wachtwoord ."', '1')");
        }
// bij deze functie wordt alle data van de leden in de $read variabel gestopt
        public function Read()
        {
            // maakt een nieuwe connectie naar de database en voert de query uit en stopt hem in de $read variabel
            $action = new connection;
            $this->read = $action->select("SELECT * FROM `leden` WHERE `lidID` = 1");
        }
// bij deze functie wordt de data van de geselecteerde lid opgehaald
        public function Getdata($ID)
        {
            // maakt een nieuwe connectie naar de database en voert de query uit en stopt hem in de $data variabel
            $action = new connection;
            $this->data = $action->select("SELECT * FROM `leden` WHERE `lidID` = $ID");
        }
// bij deze functie worden de variabelen van de users/update.php ingevuld en in de query gestopt
        public function Update($Voornaam, $Achternaam, $Telefoonnummer, $Email, $Wachtwoord, $ID)
        {
            // maakt een nieuwe connectie naar de database en voert de query uit en stopt hem in de $update variabel
            $action = new connection;
            $this->update = $action->update("UPDATE `leden` SET `Voornaam` = '$Voornaam', `Achternaam` = '$Achternaam', `Telefoonnummer` = '$Telefoonnummer', `Email` = '$Email', `Wachtwoord` = '$Wachtwoord' WHERE `LidID` = '$ID'");
        }
// bij deze functie wordt de ID van de geslecteerde lid ingevuld en verwijderd de lid uit de database
        public function Delete($ID)
        {
            // maakt een nieuwe connectie naar de database en voert de query uit en stopt hem in de $delete variabel
            $action = new connection;
            $this->delete = $action->delete("DELETE FROM `leden` WHERE `LidID` = '$ID'");
        }

    }

?>