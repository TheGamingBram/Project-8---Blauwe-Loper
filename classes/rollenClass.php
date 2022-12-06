<?php
class rollen
{
    public $read;
    public $roll;

    public function __construct()
    {
        include_once("..\..\assets\connect.php");
    }

    public function read()
    {
        $action = new connection;
        $this->read = $action->select("select * from leden");
    }

    public function getroll($ID){
        $action = new connection;
        $this->roll = $action->select("select * from rollen where rolid = ". $ID);
    }
    public function create()
    {
    }

    public function update()
    {
    }
}