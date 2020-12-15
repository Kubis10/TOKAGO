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
<body class="bodycoin" draggable="false">
<h1 class="header">Dodaj Tokelony</h1>
<div class="upper">
<form action="checkout.php" method="post">
    <div class="box-left">
    <h2 class="left">10</h2>
    <input type="hidden" name="price" value="5.99"/>
    <input type="hidden" name="moneyAmount" value="10"/>
    </div>
    <div class="box-right">
    <img src="../images/money.png" alt="money">
    </div>
    <button type="submit">5.99zł</button>
</form>
<form action="checkout.php" method="post">
    <div class="box-left">
    <h2 class="left">20</h2>
    <input type="hidden" name="price" value="10.99"/>
    <input type="hidden" name="moneyAmount" value="20"/>
    </div>
    <div class="box-right">
    <img src="../images/money.png" alt="money">
    </div>
    <button type="submit">10.99zł</button>
</form>
<form action="checkout.php" method="post">
    <div class="box-left">
    <h2 class="left">50</h2>
    <input type="hidden" name="price" value="25.99"/>
    <input type="hidden" name="moneyAmount" value="50"/>
    </div>
    <div class="box-right">
    <img src="../images/money.png" alt="money">
    </div>
    <button type="submit">25.99zł</button>
</form>
</div>
<div class="lower">
<form action="checkout.php" method="post">
    <div class="box-left">
    <h2 class="left">100</h2>
    <input type="hidden" name="price" value="44.99"/>
    <input type="hidden" name="moneyAmount" value="100"/>
    </div>
    <div class="box-right">
    <img src="../images/money.png" alt="money">
    </div>
    <button type="submit">44.99zł</button>
</form>
<form action="checkout.php" method="post">
    <div class="box-left">
    <h2 class="left">300</h2>
    <input type="hidden" name="price" value="139.99"/>
    <input type="hidden" name="moneyAmount" value="300"/>
    </div>
    <div class="box-right">
    <img src="../images/money.png" alt="money">
    </div>
    <button type="submit">139.99zł</button>
</form>
<form action="checkout.php" method="post">
    <div class="box-left">
        <h2 class="left">500</h2>
        <input type="hidden" name="price" value="249.99"/>
        <input type="hidden" name="moneyAmount" value="500"/>
    </div>
    <div class="box-right">
        <img src="../images/money.png" alt="money">
    </div>
    <button type="submit">249.99zł</button>
</form>
</div>
<a href="shop.php" class="back">Powrót</a>
<script>document.addEventListener('contextmenu', event => event.preventDefault());</script>
<script src="../lib/InspectorBlocker.js"></script>
</body>
</html>