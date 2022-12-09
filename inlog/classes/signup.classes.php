<?php

class Signup {

    private $voornaam;
    private $achternaam;
    private $email;
    private $ww;
    private $wwherhaal;
    private $telefoonnummer;

    public function __construct($voornaam, $achternaam, $email, $ww, $wwherhaal, $telefoonnummer) {
        $this->$voornaam = $voornaam;
        $this->$achternaam = $achternaam;
        $this->$email = $email;
        $this->$ww = $ww;
        $this->$wwherhaal = $wwherhaal;
        $this->$telefoonnummer = $telefoonnummer;
        
        //Include Database
        include_once("..\..\assets\connect.php");
    }
   
    protected function checkUser($email, $ww) {
        $stmt = $this->connect()->prepare('SELECT');

        if($stmt->(array($email, $ww))){

        }

    }

}