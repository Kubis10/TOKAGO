<?php
    session_start();
    require_once "../../res/connect.php";
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: ../../index.html');
		exit();
    }
    
    if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $user_id = $_SESSION['id'];
        $item_id = $polaczenie->real_escape_string($_POST['level']);

      $usert = $polaczenie->query("SELECT user, rank.l" . $level . ", FIND_IN_SET( rank.l" . $level . ", (SELECT GROUP_CONCAT( rank.l" . $level . " ORDER BY rank.l" . $level . " ASC) FROM rank WHERE rank.l" . $level . " not like '0')) AS scores FROM uzytkownicy, rank WHERE user =  '$user' AND rank.id_gracza = uzytkownicy.id");
      $row = $usert->fetch_assoc();
      echo '<tr class="my_score">';
      echo '<th>' . $row['scores'] . '</th>';
      echo '<td>' . $row['user'] . '</td>';
      echo '<td>' . $row[$lvl] . '</td>';
      echo '</tr>';
      echo "</tbody>";
      echo "</table>";
    $polaczenie->close();
        

    } else {
        echo "No data";
    }
    
?>