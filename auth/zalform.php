<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: ../game/gra.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>TOKAGO - Zaloguj się</title>
  <link rel="icon" type="image/png" href="../res/photo/logo.png">
  <link rel="stylesheet" href="../res/css/main.css">
</head>

<body>
	
	<form class="box" action="zaloguj.php" method="post">

	    <h1>Login</h1>
		<input type="text" name="login" placeholder="Nickname"/>
		<input type="password" name="haslo" placeholder="Hasło"/>
		<input type="submit" value="Zaloguj się" />
		<a href="rejestracja.php">Rejestracja - załóż darmowe konto!</a><br><br>
		<a href="lostPassword.html">Zapomniałeś hasła? Zresetuj je tutaj</a>
	</form>
	
<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>

</body>
</html>