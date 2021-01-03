<?php
  session_start();
  require_once "../res/connect.php";
	
	if (!isset($_SESSION['zalogowany'])){
		header('Location: ../index.html');
		exit();
  }
    
  if ($polaczenie->connect_errno!=0){
		echo "Error: ".$polaczenie->connect_errno;
  }
    
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $level = $polaczenie->real_escape_string($_POST['level']);

        $user = $_SESSION['user'];
          echo '<table id="$level" class="flex-item">';
          echo "<thead>";
          echo "<th>Level " . $level . "</th><th>Nick</th><th>Czas</th>";
          echo "</thead>";
          $lvl = "l" . $level;
          $query = $polaczenie->query("SELECT user, rank.l" . $level . ", vip  FROM uzytkownicy, rank where rank.id_gracza = uzytkownicy.id ORDER BY rank.l" . $level . " ASC");
          echo "<tbody>";
          $nums = 1;
          while ($row = $query->fetch_assoc()) {
            if ($row[$lvl] != "0") {

              if (ifVIP($row['vip'])){
                echo '<tr>';
                echo '<th>' . $nums . '</th>';
                echo '<td><font color="gold" size="4"><b> ' . $row['user'] . '</b> <i class="fas fa-crown"></i></td>';
                echo '<td>' . $row[$lvl] . '</td>';
                echo '</tr>';
              } else {
                echo '<tr>';
                echo '<th>' . $nums . '</th>';
                echo '<td> ' . $row['user'] . '</td>';
                echo '<td>' . $row[$lvl] . '</td>';
                echo '</tr>';
              }
              $nums += 1;
            }
          }
          $usert = $polaczenie->query("SELECT user, vip,  rank.l" . $level . ", FIND_IN_SET( rank.l" . $level . ", (SELECT GROUP_CONCAT( rank.l" . $level . " ORDER BY rank.l" . $level . " ASC) FROM rank WHERE rank.l" . $level . " not like '0')) AS scores FROM uzytkownicy, rank WHERE user =  '$user' AND rank.id_gracza = uzytkownicy.id");
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