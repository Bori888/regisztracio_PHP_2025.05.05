<?php
	class User{
		private $host="localhost";
		private $felhasznalonev="root";
		private $jelszo="";
		private $abNev="pizzahot";
		private $kapcsolat;
    
		//konstuktor
		public function __construct() {	
			$this->kapcsolat = new mysqli($this->host, $this->felhasznalonev, $this->jelszo, $this->abNev);
        	if ($this->kapcsolat->connect_error) {
            	die("Kapcsolódási hiba: " . $this->kapcsolat->connect_error);
        	}
		//ékezetes betűk
		$this->kapcsolat->query("SET NAMES UTF8");
		}

		public function reg_felhasznalo($nev, $email, $jelszo){
			//jelszó titkosítása
			$jelszo = md5($jelszo);
			//lekérdezem a felhasznalo adatai alapján, létezik-e már?
			$sql = "SELECT * FROM felhasznalo WHERE nev = '$nev' OR email = '$email'";

			if ($this->kapcsolat->query($sql)->num_rows == 0) {
				$sqlReg = "INSERT INTO `felhasznalo`(`jogAzon`, `nev`, `email`, `jelszo`, `bejelentkezett`) VALUES ('2', '$nev', '$email', '$jelszo', 0)";

				$result = $this->kapcsolat->query($sqlReg);
				return $result;
			}
			return false;
			//ha nem, felveszem/beszúrom a táblába az adatait; szerkesztő lesz alapból, és a bejelentkezett mező 0
				//visszatérek a lekérdezés eredményével (sikerült-e beszúrni)
			//különben hamis
		}

		
		public function bejelentkezes($emailNev, $jelszo){
			//jelszó titkosítása
			$jelszo = md5($jelszo);
			//lekérdezés: email vagy nev a megadott érték
			$sql = "SELECT *
					FROM `felhasznalo`
					WHERE (`nev` = '$emailNev' OR `email` = '$emailNev')
					and jelszo = '$jelszo'";
			//ha már létezik,
			$result = $this->kapcsolat->query($sql);
			if ($result->num_rows == 1) {
				//állítsuk be a login kulcsot a sessionben igazra,
				$_SESSION["login"] = true;
				$phpTomb = $result->fetch_array();
				//hozzuk létre a felhAzon kulcsú sessiont,
				$_SESSION["felhAzon"] = $phpTomb["felhAzon"];
				return true;
			}
			return false;
					//segítség:  $result->fetch_array(MYSQLI_ASSOC);
				//módosítsuk a bejelentkezést 1-re! térjünk vissza igazzal!
			//különben hamissal térjünk vissza!
    	}

    	
    	public function get_nev($felhAzon){
    		//felhAzon alapján név visszaadása
			$sql ="SELECT  `nev`FROM `felhasznalo` WHERE felhAzon = `$felhAzon`";
			$result = $this->kapcsolat->query($sql);
			$phpTomb =$result ->fetch_array();
			//$result->fetch_array(MYSQLI_ASSOC);
			return $phpTomb["nev"]
    	}
		
		public function adminE($felhAzon){
    		//lekérdezés
    	}

	    public function kijelentkezes() {
			$felhAzon = $_SESSION['felhAzon'];
			//módosítsd a bejelentkezett mezőt 0-ra!
	        //állítsd a session login kulcsát hamisra!
	        //állítsd le a sessiont!
	    }
		
		public function aktivok(){
			//lekérdezés
			$sql = "SELECT nev FROM felhasznalo WHERE bejelentkezett=1";
        	return $this->kapcsolat->query($sql);
		}
		
		public function megjelenit_aktivok($matrix){
			//listázza az eredményt
		}

	}
?>