<?php
class rollen
{
    public $read;
    public $roll;

    /**
     * The function is called when the class is instantiated. It includes a file that connects to the
     * database
     */
    public function __construct()
    {
        include_once("..\..\assets\connect.php");
        //include_once("..\assets\connect.php");
    }

    /**
     * It reads the data from the database and puts it in an array.
     */
    public function read()
    {
        $action = new connection;
        $this->read = $action->select("select * from leden");
    }

    /**
     * It returns the name of a role based on the ID.
     * 
     * @param ID The ID of the user
     * 
     * @return The name of the role.
     */
    public function getroll($ID)
    {
        $action = new connection;
        $this->roll = $action->select("select * from rollen where rolid = " . $ID);
        foreach ($action->select("select * from rollen where rolid = " . $ID) as $row) {
            return $row['Naam'];
        }
    }

    /**
     * It gets all the roles from the database and puts them in an array.
     */
    public function getallroll()
    {
        $action = new connection;
        $this->allroll = $action->select("select * from rollen");
    }

    /**
     * It updates the database with the new role
     * 
     * @param rol 1
     * @param id 1
     */
    public function update($rol, $id)
    {
        $action = new connection;
        $action->update("UPDATE leden set rollen=" . $rol . " where LidID=" . $id);
    }

    /**
     * It returns the first name of a member based on the member ID
     * 
     * @param id the id of the user
     * 
     * @return The first name of the member with the id .
     */
    public function getname($id)
    {
        $action = new connection;
        foreach ($action->select("select * from leden where lidID =" . $id) as $row) {
            return $row['Voornaam'];
        }
    }
    // public function create($name)
    // {
    //     $action = new connection;
    //     $action->insert("INSERT INTO `rollen` (naam) VALUES ('" . $name . "' )");
    // }
}

// $rol = new rollen();
// $rol->create("test1234");