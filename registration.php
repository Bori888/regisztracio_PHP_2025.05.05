<?php
    session_start();
    include_once 'Adatbazis.php';
    $felh = new User();
    if (isset($_REQUEST['submit'])) {
        extract($_REQUEST);
        $registration = $felh->reg_felhasznalo($nev, $email, $jelszo);
        if (!$registration) {
        // sikeres regisztráció
            echo 'Sikertelen regisztráció! Név vagy email már létezik!';}
    }
?>
<!DOCTYPE html>
<html lang="hu-HU">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Regisztráció</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main>
            <h1>Regisztráció</h1>
            <form action="" method="post" name="registration">
                <label>Név:</label>
                <input type="text" name="nev" required ><br><br>

                <label>Email</label>
                <input type="email" name="email" required><br><br>

                <label>Jelszó:</label>
                <input type="password" name="jelszo" required><br><br>

                <input type="submit" name="submit" value="Regisztráció" /><br><br>

                <a href="login.php">Vissza a bejelentkezéshez</a>
            </form>
        </main>
    </body>
</html>