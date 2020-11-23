<?php

	session_start();

	require_once "../res/connect.php";

	if ($polaczenie->connect_errno!=0){
		echo "Error: ".$polaczenie->connect_errno;
	}
    	

	$idGracza = $_SESSION['id'];

    if($polaczenie->query("INSERT INTO logs VALUES (NULL, 'Gracz o id = ".$idGracza." wylogowal sie',now())")){
    	session_unset();
		header('Location: ../index.html');
    }

?>