<?php

class SignupContrl {

    private $lidID;
    private $voornaam;
    private $achternaam;
    private $email;
    private $ww;
    private $wwherhaal;
    private $telefoonnummer;

    public function __construct($voornaam, $achternaam, $email, $ww, $wwherhaal, $telefoonnummer, $lidID) {
        $this->$lidID = $lidID;
        $this->$voornaam = $voornaam;
        $this->$achternaam = $achternaam;
        $this->$email = $email;
        $this->$ww = $ww;
        $this->$wwherhaal = $wwherhaal;
        $this->$telefoonnummer = $telefoonnummer;
        
        //Include Database
        include_once("..\..\assets\connect.php");
    }

    private function signupUser() {
        if($this->emptyInput() == false) {
            //echo "Empty input!"
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($this->invalidlidID() == false) {
            //echo "Invalid Email"
            header("location: ../index.php?error=id");
            exit();
        }

        if($this->invalidEmail() == false) {
            //echo "Empty input!"
            header("location: ../index.php?error=email");
            exit();
        }

        if($this->pwdMatch() == false) {
            //echo "Passwords don't match!"
            header("location: ../index.php?error=passwordmatch");
            exit();
        }

        // if($this->lidIDTakenCheck() == false) {
        //     //echo "Empty input!"
        //     header("location: ../index.php?error=useroremailtaken");
        //     exit();
        // }

        $this->setUser();
        
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

    private function invalidlidID(){
        $result="";
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->lidID))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return$result;
    }

    private function invalidEmail() {
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
    
    private function pwdMatch() {
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

    private function pwdMatch() {
        $result="";
        if (!$this->checkUser($this->LidID, $this->$email))
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