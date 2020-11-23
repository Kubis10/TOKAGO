<?php

	session_start();

	require_once "../res/connect.php";

	if ($polaczenie->connect_errno!=0){}
    	echo "Error: ".$polaczenie->connect_errno;

	$idGracza = $_SESSION['id'];
	
    $time = date("Y-m-d");

    $logQuery = $polaczenie->query("INSERT INTO logs ('text', 'data') VALUES ('Gracz o id = '".$idGracza."' wylogowal sie', '".$time."')");

    session_unset();
    	
	
	header('Location: ../index.html');

?>