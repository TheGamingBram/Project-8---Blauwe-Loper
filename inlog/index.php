<?php
    session_start();
?>

<section class="index-login">
    <div class="wrapper">
        <div class="index-login-signup">
        <?php
                if(isset($_SESSION["gebruikerid"]))
                {
            ?>
                    <li><a href="#"><?php echo $_SESSION["email"]; ?></a></li>
                    <li><a href="includes../login/includes/logout.inc.php" class="header-login-a">UITLOGGEN</a></li>
                    <?php
                }
                else
                {
                    ?>
                    <li><a href="#">REGISTEER</a></li>
                    <li><a href="#" class="header-login-a">LOGIN</a></li>


            <?php
                }
            ?>
            <h4>Registreer</h4>
            <p>Registreer hier</p>
            <form action="../includes/signup.inc.php" method="post">
                <input type="text" name="voornaam" placeholder="Voornaam">
                <input type="text" name="achternaam" placeholder="Achternaam">
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="ww" placeholder="Wachtwoord">
                <input type="password" name="wwherhaal" placeholder="Herhaal Wahtwoord">
                <input type="text" name="email" placeholder="Telefoonnummer">
                <br>
                <button type="submit" name="submit">Registreer</button>
            </form>
        </div>
        <div class="index-login-login">
        <h4>Login</h4>
        <p>Geen account? Registreer eerst</p>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="ww" placeholder="Wachtwoord">
            <br>
            <button type="submit" name="submit">Login</button>
        </div>







    </div>













</section>