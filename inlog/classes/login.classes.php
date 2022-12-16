<?php

class Login extends Dbh
{

    protected function getUser($email, $ww)
    {
        $stmt = $this->connect()->prepare('SELECT Wachtwoord FROM leden WHERE Email = ?');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfount");
            exit();
        }


        $hashedWW = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $pass_out = $hashedWW[0]["Wachtwoord"];
        $checkWW = password_verify($ww, $pass_out);

        if ($checkWW == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif ($checkWW == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM leden WHERE Email = ? AND Wachtwoord = ?;');

            if (!$stmt->execute(array($email, $pass_out))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfount");
                exit();
            }

            $gebruiker = $stmt->fetchALL(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["gebruikerid"] = $gebruiker[0]["LidID"];
            $_SESSION["email"] = $gebruiker[0]["Email"];
        }

        $stmt = null;
    }
}
