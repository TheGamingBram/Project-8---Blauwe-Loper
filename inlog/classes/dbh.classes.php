<?php

Class Dbh {

    public function __construct()
    {

        $host = 'localhost';
        $db_name = "blauweloper";
        $username = "root";
        $password = "";

        try {
            $this->cnn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    protected function connect(){
        try{
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=blauweloper', $username, $password);
            return $dbh;
        }
        catch (PDOException $e){
            print "Error!:" . $e->getMessage() . "<br/>";
            die();
        }
    }

}