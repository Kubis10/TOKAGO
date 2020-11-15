<?php

	session_start();
	
	if ((!isset($_SESSION['zalogowany'])) || (!isset($_SESSION['id'])))
	{
		header('Location: index.html');
		exit();
	}

	require_once "connect.php";
	
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
	<link rel="icon" type="image/png" href="photo/logo.png">
    <style>
        body{
          margin: 0;
          padding: 0;
          font-family: sans-serif;
          background: #34495e;
          color: white;
        }
        .flex-container {
              display: flex;
              flex-wrap: wrap;
              flex-direction: row;
              justify-content: space-around;
              align-items: auto;
              align-content: space-between
            }

        .flex-item {
            order: 0;
            flex: 0 1 auto;
            align-self: auto;
            }
        .back{
        text-decoration: none;
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 7px;
        background-color: #990000;
        border-radius: 5px;
        border: 1px solid black;
        color: white;
        }
        table {
            margin-top: 2vh;
            margin-bottom:2vh;
            background-color: #191919;
            border: #191919 solid 1px;
        }
        thead, tbody, td, tr, th{
            border: #3498db solid 1px;
            padding: 10px;
        }
        th{
            text-align: center;
            color: white;
            font-size: 15px;
            font-weight: 400;
        }
        tr{
            height: 5vh;
            color: white;
            font-size: 10px;
            font-weight: 300;
            text-align: center;
        }
        .my_score{
        color: gold;
        font-size: 15px;
        }
    </style>
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