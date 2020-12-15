<?php
require_once "../../res/connect.php";
	session_start();

	if (!isset($_SESSION['zakupmonet']))
	{
		header('Location: ../../index.html');
		exit();
	}
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
   <h3 id="txn"></h3>
   <h3 id="status"></h3>
   <h3 id="amount"></h3>
   <h3 id="currency"></h3>
   <h3 id="email"></h3>
</body>
<script>
	let txn = document.getElementById("txn");
	let status = document.getElementById("status");
	let amount = document.getElementById("amount");
	let currency = document.getElementById("currency");
	let email = document.getElementById("email");

	let txn_txt = localStorage.getItem("txn_id");
	let status_txt = localStorage.getItem("payment_status");
	let payment_txt = localStorage.getItem("payment_amount");
	let currency_txt = localStorage.getItem("payment_currency");
	let email_txt = localStorage.getItem("payer_email");
	let moneyAmount = localStorage.getItem("moneyAmount");

	txn.innerHTML = txn_txt;
	status.innerHTML = status_txt;
	amount.innerHTML = payment_txt;
	currency.innerHTML = currency_txt;
	email.innerHTML = email_txt;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			let respond = JSON.parse(this.responseText);
			console.log(respond);
		}
	}
    xhttp.open("POST", "addBuyerDB.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`txn_id=${txn_txt}&payer_email=${email_txt}&payment_status=${status_txt}&payment_amount=${payment_txt}&payment_currency=${currency_txt}`);

</script>
</html>