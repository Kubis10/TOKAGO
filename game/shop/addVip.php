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
        $ile = $polaczenie->real_escape_string($_POST['ile']);
        $money = $polaczenie->real_escape_string($_POST['money']);

        if($ile == "miesiac"){
            $czas = "1 MONTH";
        }
        else {
            $czas = "1 YEAR";
        }
        $vip = $_SESSION['vip'];
        $dataczas = new DateTime();
        $koniec = DateTime::createFromFormat('Y-m-d H:i:s', $vip);
    
        $roznica = $dataczas->diff($koniec);

        if($dataczas>$koniec){
            $time ="now() + INTERVAL '$czas'";
        }
        else{
            $time ="'$vip' + INTERVAL '$czas'";
        }

        if ($polaczenie->query("UPDATE uzytkownicy SET vip = ('$time') WHERE id = '$user_id'")){
            if ($polaczenie->query("UPDATE uzytkownicy SET balance = balance - '$money' WHERE id = '$user_id'")){
                if($polaczenie->query("INSERT INTO logs VALUES (NULL, 'Gracz o id = ".$user_id." przedłużył vipa o = ".$ile."!', now())")){
                    echo "tak";
                }
             }
             else {
                 echo "nie";
             }
        }
        else {
            echo "nie";
        }
        

    } else {
        echo "No data";
    }
    
?>