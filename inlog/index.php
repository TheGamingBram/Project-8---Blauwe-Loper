<section class="index-login">
    <div class="wrapper">
        <div class="index-login-signup">
            <h4>Registreer</h4>
            <p>Registreer hier</p>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="voornaam" placeholder="Voornaam">
                <input type="text" name="achternaam" placeholder="Achternaam">
                <input type="text" name="email" placeholder="E-mail">
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
            <input type="text" name="id" placeholder="E-mail">
            <input type="password" name="pwd" placeholder="Wachtwoord">
            <br>
            <button type="submit" name="submit">Login</button>
        </div>







    </div>













</section>