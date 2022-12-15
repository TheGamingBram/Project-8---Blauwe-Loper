<?php

class Signup extends Dbh {

    protected function setUser($lidID, $ww, $email){
        $stmt = $this->connect()->prepare('INSERT INTO leden (Lidnummer, Email, Wachtwoord) VALUES (?, ?, ?);');
        
        $hashedWW= password_hash($ww, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($lidID, $hashedWW, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
    }


    protected function checkUser($lidID, $email){
        $stmt = $this->connect()->prepare('SELECT LidID FROM leden WHERE LidID = ? OR Email = ?;');
        
        
        if(!$stmt->execute(array($lidID, $email))) {
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