<?php

session_start();

if ((!isset($_SESSION['zalogowany'])) || (!isset($_SESSION['id']))) {
  header('Location: ../index.html');
  exit();
}

require_once "../res/connect.php";

if ($polaczenie->connect_errno != 0) {
  echo "Error: " . $polaczenie->connect_errno;
}

?>
<!DOCTYPE HTML>
<html lang="pl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
  <title>TOKAGO | Ranking</title>
  <link rel="icon" type="image/png" href="../res/photo/logo.png">
  <link rel="stylesheet" href="../res/css/ranking.css">
  <script src="https://kit.fontawesome.com/0ed3b8ed5d.js" crossorigin="anonymous"></script>
</head>

<body>
  <h1 id="title">Ranking</h1>
  <div class="select">
    <label for="lvl-select">Wybierz poziom:</label>
    <select id="lvl-select" class="lvl-select">
      <optgroup label="Rozdział 1">
        <option value="1" selected="selected">Level 1</option>
        <option value="2">Level 2</option>
        <option value="3">Level 3</option>
      </optgroup>
      <optgroup label="Rozdział 2">
        <option value="4">Level 4</option>
        <option value="5">Level 5</option>
        <option value="6">Level 6</option>
      </optgroup>
      <optgroup label="Rozdział 3">
        <option value="7">Level 7</option>
        <option value="8">Level 8</option>
        <option value="9">Level 9</option>
      </optgroup>
    </select>
  </div>
  <article class="flex-container" id="ranking">

  </article>
  <a href="gra.php" class="back">Powrót</a>
  <script>
    window.addEventListener("load", function () {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("ranking").innerHTML =
          this.responseText;
        }
      };
      xhttp.open("POST", "readRanks.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send(`level=1`);
    });
    //=======================================
    const selectElement = document.querySelector('.lvl-select');

    selectElement.addEventListener('change', (event) => {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("ranking").innerHTML =
          this.responseText;
        }
      };
      xhttp.open("POST", "readRanks.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send(`level=${event.target.value}`);
    });
  </script>
</body>

</html>