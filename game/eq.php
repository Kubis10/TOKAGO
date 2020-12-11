<?php 
	require_once("../res/connect.php");

	session_start();
	
	if ((!isset($_SESSION['zalogowany'])) || (!isset($_SESSION['id'])))
	{
		header('Location: ../index.html');
		exit();
	}
    $sesid = $_SESSION['id'];

?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/png" href="../res/photo/logo.png">
    <title>TOKAGO | Ekwipunek</title>
    <link rel="stylesheet" href="../res/css/eq.css"/>
</head>
<body>
    <div class="container">
        <form class="items">
        <label class="skin">
            <input type="radio" name="skin" value="Pink_Monster" onclick="display()">
            <img src="shop/img/Pink_Monster.png" alt="skin">
        </label>
        <label class="skin">
            <input type="radio" name="skin" value="Dude_Monster" onclick="display()">
            <img src="shop/img/Dude_Monster.png" alt="skin">
        </label>
        <label class="skin">
            <input type="radio" name="skin" value="Owlet_Monster" onclick="display()">
            <img src="shop/img/Owlet_Monster.png" alt="skin">
        </label>
        <label class="skin">
            <input type="radio" name="skin" value="Weed_Monster" onclick="display()">
            <img src="shop/img/Weed_Monster.png" alt="skin">
        </label>
        <label class="skin">
            <input type="radio" name="skin" value="Princess_Girl" onclick="display()">
            <img src="shop/img/Princess_Girl.png" alt="skin">
        </label>
        <label class="skin">
            <input type="radio" name="skin" value="Santa_Event" onclick="display()">
            <img src="shop/img/Santa_Event.png" alt="skin">
        </label>
        <label class="skin">
            <input type="radio" name="skin" value="Starter" onclick="display()">
            <img src="shop/img/Starter.png" alt="skin">
        </label>

        <input type="submit" class="okey" value="Zatwierdź">
        </form>
    </div>
    <section class="monster">
        <img src="shop/img/Pink_Monster.png" alt="monster" id="img_mon">
    </section>
<script src="../res/js/eq.js"></script>
</body>
</html>