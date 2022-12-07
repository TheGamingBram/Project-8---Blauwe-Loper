<?php
class rollen
{
    public $read;
    public $roll;

    public function __construct()
    {
        include_once("..\..\assets\connect.php");
        //include_once("..\assets\connect.php");
    }

    public function read()
    {
        $action = new connection;
        $this->read = $action->select("select * from leden");
    }

    public function getroll($ID){
        $action = new connection;
        $this->roll = $action->select("select * from rollen where rolid = ". $ID);
        foreach ($action->select("select * from rollen where rolid = ". $ID) as $row) {
            return $row['naam'];
        }
    }
    public function getallroll()
    {
        $action = new connection;
        $this->allroll = $action->select("select * from rollen");
    }

    public function update($rol, $id)
    {
        $action = new connection;
        $action->update("UPDATE leden set rollen=". $rol ." where Lidnummer=". $id);
    }
    public function getname($id){
        $action = new connection;
        foreach ($action->select("select * from leden where lidnummer =". $id) as $row) {
            return $row['Voornaam'];
        }
    }

    public function create($name){
        $action = new connection;
        $action->insert("INSERT INTO `rollen` (naam) VALUES ('". $name ."' )");
    }
}

// $rol = new rollen();
// $rol->create("test1234");