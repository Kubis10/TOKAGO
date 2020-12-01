<?php
require_once "../res/connect.php";
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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HZQB1WZ4W7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-HZQB1WZ4W7');
    </script>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<title>TOKAGO</title>
	<link rel="icon" type="image/png" href="../res/photo/logo.png">
	<script src='lib/quintus.js'></script>
    <script src='lib/quintus_sprites.js'></script>
    <script src='lib/quintus_scenes.js'></script>
    <script src='lib/quintus_input.js'></script>
    <script src='lib/quintus_touch.js'></script>
    <script src='lib/quintus_2d.js'></script>
    <script src='lib/quintus_anim.js'></script>
    <script src='lib/quintus_audio.js'></script>
    <script src='lib/quintus_ui.js'></script>
    <script src='lib/quintus_tmx.js'></script>
    <script src='platformer.js'></script>
    <link rel="stylesheet" href="../res/css/main.css">
    <style>
      body { padding:0px; margin:0px;}
    </style>
</head>

<body onmousedown='return false;' onselectstart='return false;'>
<?php
$result = $polaczenie->query("SELECT id, lvl FROM uzytkownicy WHERE id='$sesid'");
    if($result->num_rows>0) {
       $resultTable = $result->fetch_assoc();
       $lvl = $resultTable['lvl'];
       $id = $resultTable['id'];
    }
    echo '<p hidden id="level">'.$lvl."</p>";
    echo '<p hidden id="ids">'.$id."</p>";
    /*
	echo "<br /><b>Data wygaśnięcia premium</b>: ".$_SESSION['vip']."</p>";


	$dataczas = new DateTime();

	echo "Data i czas serwera: ".$dataczas->format('Y-m-d H:i:s')."<br>";

	$koniec = DateTime::createFromFormat('Y-m-d H:i:s', $_SESSION['vip']);

	$roznica = $dataczas->diff($koniec);

	if($dataczas<$koniec)
	echo "Pozostało premium: ".$roznica->format('%y lat, %m mies, %d dni, %h godz, %i min, %s sek');
	else
	echo "Premium nieaktywne od: ".$roznica->format('%y lat, %m mies, %d dni, %h godz, %i min, %s sek');*/
?>
  <div id='loading'>
    <div id='loading_container'>
      <div id='loading_progress'><span>Loading...</span></div>
    </div>
  </div>
    <SCRIPT src="lib/ServerDate.js"></SCRIPT>
    <script>
    var contime = document.getElementById("tims")
    function updateClocks()
    {
        var date = ServerDate;
    }
    updateClocks();
    setInterval(updateClocks, 10);
    </script>
</body>
</html>