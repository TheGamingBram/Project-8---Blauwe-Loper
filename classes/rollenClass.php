<?php
class rollen
{
    public $read;

    public function __construct()
    {
        include_once("..\assets\connect.php");
    }

    public function read()
    {
        $action = new connection;
        $this->read = $action->select("select * from leden");
    }

    public function create()
    {
    }

    public function update()
    {
    }
}


$rol = new rollen();
$rol->read();
foreach ($rol->read as $row) {
    echo $row['Voornaam'];
}
