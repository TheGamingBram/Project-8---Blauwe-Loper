<?php

class SignupContrl {

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

    private function emptyInput() {
        $result="";
        if(empty($this->voornaam) || empty($this->achternaam) || empty($this->email) || empty($this->ww) || empty($this->wwherhaal) || empty($this->telefoonnummer)) 
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
        }

    // function isTelNummer($telefoonnummer) {
    //     if (preg_match('/^[0-9\-]|[\+0-9]|[0-9\s]|[0-9()]*$/', $telefoonnummer)) {
    //          return true;
    //      } 
    //      else 
    //      {
    //          return false;
    //      }
    //   }   

    function invalidEmail() {
        $result="";
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
        {
            $result = false;
        } 
        else 
        {
            $result = true;
        }
        return $result;
    }  
    
    function pwdMatch() {
        $result="";
        if ($this->pwd !== $this->pwdRepaat)
        {
            $result = false;
        } 
        else 
        {
            $result = true;
        }
        return $result;
    }   
  

}