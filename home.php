<?php
session_start(); // Session elindítása
include_once 'Adatbazis.php'; // Osztály betöltése

// Új felhasználó objektum példányosítása
$felh = new User();

// Ha nincs bejelentkezve a felhasználó, irány a login oldal
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit;
}

$felhAzon = $_SESSION["felhAzon"];

// Kijelentkezés kezelése URL-ből
if (isset($_GET['logout'])) {
    $felh->kijelentkezes();
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="hu-HU">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="stilus.css">

</head>

<body>
    <main>
        <h1>Kezdőlap</h1>
        <!--<img src="./kepek/02.jpg" alt="valami">-->
        <div>
            <h2>Hello <?php echo $felh->get_nev($felhAzon); ?>!</h2>

        </div>
        <div>
            <a href="home.php?logout=true">Kijelentkezés</a>
        </div>

        <?php
        //ha admin a felh-ó, akkor megjelenítjük a bej-tt felh-kat
        ?>
    </main>
</body>

</html>