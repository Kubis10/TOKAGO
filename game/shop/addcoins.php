<?php

	session_start();

	if ((!isset($_SESSION['zalogowany'])) || (!isset($_SESSION['id'])))
	{
		header('Location: ../../index.html');
		exit();
	}

	require_once "../../res/connect.php";

	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TOKAGO | Dodaj Tokelony</title>
    <link rel="icon" type="image/png" href="../../res/photo/logo.png">
    <link rel="stylesheet" href="../../res/css/shop.css"/>
</head>
<body class="bodycoin">
<h1 class="header">Dodaj Tokelony</h1>
<form action="checkout.php" method="post">
    <h2 class="upper">10</h2>
    <input type="hidden" name="price" value="5.99"/>
    <h2 class="lower">5.99zł</h2>
    <button type="submit"></button>
</form>
<form action="checkout.php" method="post">
    <h2 class="upper">20</h2>
    <input type="hidden" name="price" value="10.99"/>
    <h2 class="lower">10.99zł</h2>
    <button type="submit"></button>
</form>
<form action="checkout.php" method="post">
    <h2 class="upper">50</h2>
    <input type="hidden" name="price" value="25.99"/>
    <h2 class="lower">25.99zł</h2>
    <button type="submit"></button>
</form>
<form action="checkout.php" method="post">
    <h2 class="upper">100</h2>
    <input type="hidden" name="price" value="44.99"/>
    <h2 class="lower">44.99zł</h2>
    <button type="submit"></button>
</form>
<form action="checkout.php" method="post">
    <h2 class="upper">300</h2>
    <input type="hidden" name="price" value="139.99"/>
    <h2 class="lower">139.99zł</h2>
    <button type="submit"></button>
</form>
<form action="checkout.php" method="post">
    <h2 class="upper">500</h2>
    <input type="hidden" name="price" value="249.99"/>
    <h2 class="lower">249.99zł</h2>
    <button type="submit"></button>
</form>
<a href="shop.php" class="back">Powrót</a>
</body>
</html>