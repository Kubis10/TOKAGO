<?php
require_once "../../res/connect.php";
	session_start();

	if (!isset($_SESSION['zakup']))
	{
		header('Location: ../index.html');
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
    <?php
        if($_SESSION['zakup']==true)
        {
            echo '    <div class="container logo">
                          <div class="logo">
                              <img src="../../res/photo/logo.png" alt="logo" width="150px" height="150px">
                          </div>
                          <h1>Dziękujemy za zakup!</h1>
                          <a href="shop.php">Powrót do strony głownej</a>
                      </div>';

        }
        else
        {
            echo "<h1 style='text-align: center; margin-top: 20vh;'>Zakup się nie powiodł. Spróbuj ponownie póżniej</h1>";
        }
    ?>
</body>
</html>