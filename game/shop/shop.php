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
<html>

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
		<h2 class="moneys"><?php

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
			<!--1------------------------------>
			<li class="item-a" onclick="zakup(5, 7)">
				<!--slider-box-->
				<div class="box">
					<p class="marvel common">Skeleton</p>
					<!--model-->
					<img src="img/Skeleton_guy.png" class="model">
					<!--details-->
					<div class="details">
						<!--logo-character-->
						<img src="img/5_money.png" class="logo">
						<!--character-details-->
						<p>Zmartwywstał i przybył z obcej gry aby walczyć z innymi umarlakami.<br><br></p>
					</div>

				</div>
			</li>
			<!--2------------------------------>
			<li class="item-a" onclick="zakup(10, 2)">
				<!--slider-box-->
				<div class="box">
					<p class="marvel epic">DUDE</p>
					<!--model-->
					<img src="img/Dude_Monster.png" class="model">
					<!--details-->
					<div class="details">
						<!--logo-character-->
						<img src="img/10_money.png" class="logo">
						<!--character-details-->
						<p>Dude to potomek squirtle. Podczas ewolucji nauczył się chodzić na 2 nogach. Chusta to prezent od jego rodziców w dniu urodzin.</p>
					</div>

				</div>
			</li>
			<!--3------------------------------>
			<li class="item-a" onclick="zakup(7, 3)">
				<!--slider-box-->
				<div class="box">
					<p class="marvel uncommon">OWLET</p>
					<!--model-->
					<img src="img/Owlet_Monster.png" class="model">
					<!--details-->
					<div class="details">
						<!--logo-character-->
						<img src="img/7_money.png" class="logo">
						<!--character-details-->
						<p>Owlet to potomek starej rodziny sówek. Jego rodzice umarli gdy był mały jednak owlet się nie poddaje i walczy do końca.</p>
					</div>

				</div>
			</li>
			<!--4------------------------------>
			<li class="item-a" onclick="zakup(20, 4)">
				<!--slider-box-->
				<div class="box">
					<p class="marvel legendary">WEED</p>
					<!--model-->
					<img src="img/Weed_Monster.png" class="model">
					<!--details-->
					<div class="details">
						<!--logo-character-->
						<img src="img/20_money.png" class="logo">
						<!--character-details-->
						<p>Weed... Co tu dużo pisać.<br><br><br></p>
					</div>

				</div>
			</li>
			<!--5------------------------------>
			<li class="item-a" onclick="zakup(12, 5)">
				<!--slider-box-->
				<div class="box">
					<p class="marvel rare">PRINCESS</p>
					<!--model-->
					<img src="img/Princess_Girl.png" class="model">
					<!--details-->
					<div class="details">
						<!--logo-character-->
						<img src="img/12_money.png" class="logo">
						<!--character-details-->
						<p>Princess Wiana(bo tak miała na imię) była córką króla małego kozaka. Jednak życie królewskie jej nie podpadło i uciekła.</p>
					</div>

				</div>
			</li>
			<!--6------------------------------>
			<li class="item-a" onclick="zakup(15, 6)">
				<!--slider-box-->
				<div class="box">
					<p class="marvel event">Santa</p>
					<!--model-->
					<img src="img/Santa_Event.png" class="model">
					<!--details-->
					<div class="details">
						<!--logo-character-->
						<img src="img/15_money.png" class="logo">
						<!--character-details-->
						<p>Przybył w te święta aby niczym tajemniczy gość rozdawać wszystkim prezenty. Bo kto w końcu nie kocha mikołaja?</p>
					</div>

				</div>
			</li>
		</ul>

	</div>

	<div class="vip">VIP</div>
	<a href="../gra.php" class="back">Powrót</a>
	<script src="../../res/js/script.js" type="text/javascript"></script>
	<script>
		function zakup(cena, nazwa) {
			Swal.fire({
				title: 'Jesteś pewien że chcesz to kupić?',
				text: "Nie będzie możliwośći zwrotu!",
				icon: 'question',
				showCancelButton: true,
				cancelButtonText: 'Anuluj',
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Tak, kup!'
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire(
						'Kupione!',
						'Skin został dodany do twojego eq.',
						'success'
					).then((result) => {
						var xhttp = new XMLHttpRequest();
						xhttp.open("POST", "addSkin.php", true);
						xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						xhttp.send(`item_id=${nazwa}&money=${cena}`);
						window.location.reload(true);
					})
				}
			})
		}
	</script>
</body>

</html>