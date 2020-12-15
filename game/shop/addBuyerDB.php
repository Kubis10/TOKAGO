<?php
    session_start();
    require_once "../../res/connect.php";
	
	if (!isset($_SESSION['zakupmonet']) || !isset($_SESSION['zalogowany']))
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
        $payer_email = $polaczenie->real_escape_string($_POST['payer_email']);
        $payment_status = $polaczenie->real_escape_string($_POST['payment_status']);
        $payment_amount = $polaczenie->real_escape_string($_POST['payment_amount']);
        $payment_currency = $polaczenie->real_escape_string($_POST['payment_currency']);
        $txn_id = $polaczenie->real_escape_string($_POST['txn_id']);
        $moneyAmount = $_SESSION['iloscMonet'];
        $money = intval($moneyAmount);

        if ($polaczenie->query("INSERT INTO payment VALUES (NULL, '$user_id', '$payer_email', '$payment_status', '$payment_amount', '$payment_currency', '$txn_id', NULL)")){
            if ($polaczenie->query("UPDATE uzytkownicy SET balance = balance + '$money' WHERE id = '$user_id'")){
                echo "tak";
                unset($_SESSION['zakupmonet']);
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