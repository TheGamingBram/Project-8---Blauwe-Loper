<?php

class SignupContrl extends Signup {

    private $voornaam;
    private $achternaam;
    private $email;
    private $ww;
    private $wwherhaal;
    private $telefoonnummer;

    public function __construct($voornaam, $achternaam, $email, $ww, $wwherhaal, $telefoonnummer) {
        $this->voornaam = $voornaam;
        $this->achternaam = $achternaam;
        $this->email = $email;
        $this->ww = $ww;
        $this->wwherhaal = $wwherhaal;
        $this->telefoonnummer = $telefoonnummer;
    }

    public function signupUser() {
        // if($this->emptyInput() == false) {
        //     header("location: ../index.php?error=emptyinput");
        //     exit();
        // }

        // if($this->invalidlidID() == false) {
        //     //echo "Invalid Email"
        //     header("location: ../index.php?error=id");
        //     exit();
        // }

        // if($this->invalidEmail() == false) {
        //     //echo "Empty input!"
        //     header("location: ../index.php?error=email");
        //     exit();
        // }

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

        $this->setUser($this->voornaam, $this->achternaam, $this->telefoonnummer, $this->email, $this->ww);
        
    }
    

    // private function emptyInput() {
    //     $result="";
    //     echo $this->voornaam, $this->achternaam, $this->email, $this->ww, $this->wwherhaal, $this->telefoonnummer;
    //     if(empty($this->voornaam) || empty($this->achternaam) || empty($this->email) || empty($this->ww) || empty($this->wwherhaal) || empty($this->telefoonnummer)) 
    //     {
    //         $result = false;
    //     }
    //     else
    //     {
    //         $result = true;
    //     }
    //     return $result;
    //     }

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

    // private function lidIDTakenCheck() {
    //     $result="";
    //     if (!$this->checkUser($this->lidID, $this->email))
    //     {
    //         $result = false;
    //     } 
    //     else 
    //     {
    //         $result = true;
    //     }
    //     return $result;
    // }   
  

}