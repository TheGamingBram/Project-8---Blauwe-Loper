<?php

class Signup extends Dbh {

    protected function setUser($voornaam, $achternaam, $telefoonnummer, $email, $ww){
        $stmt = $this->connect()->prepare('INSERT INTO leden (Voornaam, Achternaam, Telefoonnummer, Email, Wachtwoord) VALUES (?, ?, ?, ?, ?);');
        
        $hashedWW= password_hash($ww, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($voornaam, $achternaam, $telefoonnummer, $email, $hashedWW))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
    }


    protected function checkUser($email, $ww){
        $stmt = $this->connect()->prepare('SELECT LidID FROM leden WHERE LidID = ? OR Email = ?;');
        
        
        if(!$stmt->execute(array($email, $ww))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        //$resultCheck;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }

        return $resultCheck;
        
    }

}