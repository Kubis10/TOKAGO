<?php 
	require_once("../res/connect.php");

	session_start();
	
	if ((!isset($_SESSION['zalogowany'])) || (!isset($_SESSION['id'])))
	{
		header('Location: ../index.html');
		exit();
	}
    $user = $_SESSION['id'];

if ($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}


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
        <form class="items" method="post" action="writeq.php">
            <?php
            $query = $polaczenie->query("SELECT items.name FROM eq, items where items.item_id = eq.item_id AND eq.user_id = ".$user);
            while($row = $query->fetch_assoc()){
                if($row['name']==="Pink_Monster") {
                    echo '  <label class="skin">
                            <input type="radio" name="skin" value="' . $row['name'] . '" onclick="display()" checked>
                            <img src="shop/img/' . $row['name'] . '.png" alt="skin">
                        </label>';
                }
                else {
                    echo '  <label class="skin">
                            <input type="radio" name="skin" value="' . $row['name'] . '" onclick="display()">
                            <img src="shop/img/' . $row['name'] . '.png" alt="skin">
                        </label>';
                }
            }
            ?>
             <input type="submit" class="okey" value="Zatwierdź">
             </form>
         </div>
         <section class="monster">
             <img src="shop/img/Pink_Monster.png" alt="monster" id="img_mon">
         </section>
     <script src="../res/js/eq.js"></script>
     </body>
     </html>