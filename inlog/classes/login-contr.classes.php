<?php

class LoginContrl extends Login {

    private $email;
    private $ww;

    public function __construct($email, $ww) {
        $this->email = $email;
        $this->ww = $ww;
        
        //Include Database
        include_once("..\..\assets\connect.php");
    }

    public function loginUser() {
        if($this->emptyInput() == false) {
            //echo "Empty input!"
            header("location: ../index.php?error=emptyinput");
            exit();
        }


        $this->getUser($this->email;, $this->ww);
        
    }
    

    private function emptyInput() {
        $result="";
        if(empty($this->email) || empty($this->ww)) 
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