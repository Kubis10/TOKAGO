<?php
    session_start();
    require_once "../../res/connect.php";
	
	if (!isset($_SESSION['zalogowany']) || isset($_POST['item_id']))
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
        $item_id = $polaczenie->real_escape_string($_POST['item_id']);
        $money = $polaczenie->real_escape_string($_POST['money']);

        if ($polaczenie->query("INSERT INTO eq VALUES ('$user_id','$item_id')")){
            if ($polaczenie->query("UPDATE uzytkownicy SET balance = balance - '$money' WHERE id = '$user_id'")){
                if($polaczenie->query("INSERT INTO logs VALUES (NULL, 'Gracz o id = ".$user_id." kupił skina o id = ".$item_id."', now())")){
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