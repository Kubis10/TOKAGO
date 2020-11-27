<?php
require_once "../res/connect.php";
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
	<title>TOKAGO | Podsumowanie</title>
</head>
<body>
    <?php
        if($_SESSION['zakup']==true)
        {

        }
        else
        {

        }
    ?>
</body>
</html>