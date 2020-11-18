<?php

	session_start();
	
	if ((!isset($_SESSION['zalogowany'])) || (!isset($_SESSION['id'])))
	{
		header('Location: ../index.html');
		exit();
	}

	require_once "../res/connect.php";
	
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
	<title>TOKAGO | Ranking</title>
	<link rel="icon" type="image/png" href="../res/photo/logo.png">
    <link rel="stylesheet" href="../res/css/main.css">
</head>
<body>
<h1 style="text-align: center;">Ranking</h1>
<div class="flex-container">
<?php
$user = $_SESSION['user'];
for ($level = 1; $level <= 11; $level++) {
    echo '<table id="$level" class="flex-item">';
    echo "<thead>";
    echo "<th>Level ".$level."</th><th>Nick</th><th>Czas</th>";
    echo "</thead>";
    $lvl = "l".$level;
      $query = $polaczenie->query("SELECT user, rank.l".$level." FROM uzytkownicy, rank where rank.id_gracza = uzytkownicy.id ORDER BY rank.l".$level." ASC");
      echo "<tbody>";
        $nums = 1;
        while($row = $query->fetch_assoc()){
        if($row[$lvl]!="0" && $nums<11){
          echo '<tr>';
            echo '<td>'.$nums.'</td>';
            echo '<th>' . $row['user'] . '</th>';
            echo '<td>' . $row[$lvl] . '</td>';
          echo '</tr>';
                    $nums+=1;
          }
       }
       $usert = $polaczenie->query("SELECT user, rank.l".$level.", FIND_IN_SET( rank.l".$level.", (SELECT GROUP_CONCAT( rank.l".$level." ORDER BY rank.l".$level." ASC) FROM rank WHERE rank.l".$level." not like '0')) AS scores FROM uzytkownicy, rank WHERE user =  '$user' AND rank.id_gracza = uzytkownicy.id");
        $row = $usert->fetch_assoc();
                  echo '<tr class="my_score">';
                    echo '<td>'.$row['scores'].'</td>';
                    echo '<td>' . $row['user'] . '</td>';
                    echo '<td>' . $row[$lvl] . '</td>';
                  echo '</tr>';
     echo "</tbody>";
     echo "</table>";
 }
 $polaczenie->close();
?>
</div>
<a href="gra.php" class="back">Powrót</a>
</body>
</html>