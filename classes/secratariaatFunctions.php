<?php

    class secratariaat
    {

        public $read;

        public function __construct()
        {
            include_once("..\assets\connect.php");
            include_once("..\assets\header.php");
        }

        public function Create()
        {
            
        }

        public function Read()
        {
            $action = new connection;
            $this->read = $action->select("select * from leden");
        }

        public function ReadPull()
        {
            $action = new connection;
            $this->read = $action->select("select * from leden");
        }

        public function Update()
        {

        }

        public function Delete()
        {

        }

    }

    $rol = new secratariaat();
    $rol->read();
    
    ?>
    <div class="container d-flex justify-content-center">
    <table class="table table-dark table-striped w-75">
        <thead>
            <tr>
            <th scope="col">Voornaam</th>
            <th scope="col">Achternaam</th>
            <th scope="col">Telefoon nummer</th>
            <th scope="col">Email</th>
            <th scope="col">Wachtwoord</th>
            <th scope="col">Rollen</th>
            </tr>
        </thead>
        <tbody>
        
        <?php 

            foreach ($rol->read as $row) {
            echo "<tr>";
            echo "<td>" . $row['Voornaam'] . "</td>";
            echo "<td>" . $row['Achternaam'] . "</td>";
            echo "<td>" . $row['Telefoon nummer'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Wachtwoord'] . "</td>";
            echo "<td>" . $row['Rollen'] . "</td>";
            echo "</tr>";
        }
               
        ?>
        </tbody>
    </table>
    </div>
<?php    

?>