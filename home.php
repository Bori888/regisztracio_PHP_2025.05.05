<?php
//session elindítása
//import

//új felhasználó

//ha nincs bejelentkezve a felhasználó, akkor a bejelentkezéshez ugorjon!
//különben: megfelelő session leolvasása (felhAzon lekérdezése)

//url-ben állapottartás: ha rákattintott a kijelentkezésre, akkor
//kijelentkeztetés után ugorjon a bejelentkezés oldalra!
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
				<h2>Hello <?php echo $felh-> get_nem ($felhAzon);?>!</h2>
            </div>
			<div>
				<!--url-ben állapottartás: link a kijelentkezésre-->
			</div>
			<?php
				//ha admin a felh-ó, akkor megjelenítjük a bej-tt felh-kat
			?>
        </main>
    </body>
</html>