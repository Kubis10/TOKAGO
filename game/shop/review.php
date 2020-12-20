<?php
require_once "../../res/connect.php";
	session_start();

	if (!isset($_SESSION['zakupmonet']))
	{
		header('Location: ../../index.html');
		exit();
	}
	echo "<div id='monets' hidden>". $_SESSION['iloscMonet']." </div>";

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/png" href="../../res/photo/logo.png">
	<title>TOKAGO | Podsumowanie</title>
	<link rel="stylesheet" href="../../res/css/shop.css"/>
</head>
<body>
	<section class="rev">
	<div class="check"><img src="../../res/photo/logo.png" alt="logo"></div>
  		<h3 id="txn">Zamówienie </h3>
  		<h3 id="status">Płatność </h3>
  		<h3 id="amount"></h3>
		<h3 id="email">Email: </h3>
		<h3 id="monety">Monety: </h3>
		<a href="shop.php" class="koniec">Powrót</a>
	</section>
</body>
<script>
	let txn = document.getElementById("txn");
	let status = document.getElementById("status");
	let amount = document.getElementById("amount");
	let email = document.getElementById("email");
	let monety = document.getElementById("monety");

	let txn_txt = localStorage.getItem("txn_id");
	let status_txt = localStorage.getItem("payment_status");
	let payment_txt = localStorage.getItem("payment_amount");
	let currency_txt = localStorage.getItem("payment_currency");
	let email_txt = localStorage.getItem("payer_email");
	let moneyAmount = document.getElementById("monets").innerHTML;

	txn.innerHTML += txn_txt;
	status.innerHTML += status_txt;
	amount.innerHTML += payment_txt;
	amount.innerHTML += currency_txt;
	email.innerHTML += email_txt;
	monety.innerHTML += moneyAmount;

	var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "addBuyerDB.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`txn_id=${txn_txt}&payer_email=${email_txt}&payment_status=${status_txt}&payment_amount=${payment_txt}&payment_currency=${currency_txt}`);

</script>
</html>