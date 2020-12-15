<?php
require_once "../../res/connect.php";
	session_start();

	if (!isset($_SESSION['zakup']))
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
   
</body>
</html>