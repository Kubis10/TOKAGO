<?php
require_once("../../res/connect.php");

session_start();

if ((!isset($_SESSION['zalogowany'])) || (!isset($_SESSION['id']))) {
	header('Location: ../../index.html');
	exit();
}
$sesid = $_SESSION['id'];

?>

<!doctype html>
<html lang="pl">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TOKAGO | Sklep </title>
	<link rel="stylesheet" href="../../res/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../../res/css/lightslider.css" />
	<link rel="icon" type="image/png" href="../../res/photo/logo.png">
	<!--Jquery-->
	<script type="text/javascript" src="../../res/js/JQuery3.3.1.js"></script>
	<script type="text/javascript" src="../../res/js/lightslider.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
	<header>
		<a href="../eq.php">
			<img src="../images/plecak.png" width="40" height="40" class="backpack">
		</a>
	</header>
	<nav>
		<a href="addcoins.php">
			<div class="adds">
				+
			</div>
		</a>
		<h2 class="moneys" id="stan"><?php

							$nick = $_SESSION['user'];

							$checkBalance = $polaczenie->query("SELECT balance FROM uzytkownicy WHERE user = '$nick'");
							if ($checkBalance->num_rows > 0) {

								$tmp = $checkBalance->fetch_assoc();
								$balance = $tmp['balance'];
								echo $balance;
							}

							?></h2>
		<div>
			<img src="../images/money.png" width="30" height="30" class="iconDetails" alt="money">
		</div>
	</nav>
	<div class="container">
		<!--slider------------------->
		<ul id="autoWidth" class="cs-hidden">
		<?php
            $user = $_SESSION['id'];
			$query = $polaczenie->query("SELECT items.name, items.item_id, items.s_nick, items.klasa, items.cost, items.about, (
				SELECT eq.item_id from uzytkownicy join eq on uzytkownicy.id = eq.user_id
			) AS czyObecny FROM items where items.czy_sklep = '1'");

			//join (
			//SELECT items.item_id from użytkownicy join itemy on uż.id = itemy.uż_id;)

            while($row = $query->fetch_assoc()) {

				//przyrownanie $query i $itemy aby sprawdzić czy user ma juz taki item

                echo '
                <li class="item-a" onclick="zakup('. $row["cost"] .', '. $row["item_id"] .')">
				<!--slider-box-->
				<div class="box">
					<p class="marvel '. $row["klasa"] .'">'. $row["s_nick"] .'</p>
					<!--model-->
					<img src="img/'. $row["name"] .'.png" class="model" alt="skin">
					<!--details-->
					<div class="details">
						<!--logo-character-->
						<img src="img/'. $row["cost"] .'_money.png" class="logo" alt="money">
						<!--character-details-->
						<p>'. $row["about"] .'</p>
					</div>

				</div>
				</li>';
			}
            ?>
		</ul>

	</div>

	<a class="vip" href="vip.php">VIP</a>
	<a href="../gra.php" class="back">Powrót</a>
	<script src="../../res/js/script.js" type="text/javascript"></script>
	<script src="../../res/js/sklep.js" type="text/javascript"></script>
	<script>document.addEventListener('contextmenu', event => event.preventDefault());</script>
</body>

</html>