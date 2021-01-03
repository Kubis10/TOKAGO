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

        if(ifVIP($vip)){
            $time = "ADDDATE('$vip', INTERVAL ".$czas .")";
        } else {
            $time ="(now() + INTERVAL ".$czas.")";
        }

        $query = $polaczenie->query("SELECT balance FROM uzytkownicy WHERE id = '$user_id'");

        while ($row = $query->fetch_assoc()){
            $monety =  $row['balance'];
        }
        
        if($monety<$money){
            die();
        } else {
            if ($polaczenie->query("UPDATE uzytkownicy SET vip = $time WHERE id = '$user_id'")){
                if ($polaczenie->query("UPDATE uzytkownicy SET balance = balance - '$money' WHERE id = '$user_id'")){
                    if($polaczenie->query("INSERT INTO logs VALUES (NULL, 'Gracz o id = ".$user_id." przedłużył vipa o ".$czas."!', now())")){
                        if($polaczenie->query("INSERT INTO eq VALUES ('$user_id','8')")){

                        }
                        else{
                            echo "nie 4";
                        } 
                    } else {
                        echo "nie 3";
                    }
                } else {
                     echo "nie 2";
                }
            } else {
                echo "nie 1";
            }
        }
    } else {
        echo "No data";
    }
    
?>