<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: ../index.html');
		exit();
	}

	require_once "../res/connect.php";
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
		mysqli_real_escape_string($polaczenie,$login))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$wiersz = $rezultat->fetch_assoc();
				
				if (password_verify($haslo, $wiersz['pass']))
				{
					$_SESSION['zalogowany'] = true;
					$_SESSION['id'] = $wiersz['id'];
					$_SESSION['user'] = $wiersz['user'];
					$_SESSION['email'] = $wiersz['email'];
					$_SESSION['vip'] = $wiersz['vip'];
					$time = date("Y-m-d");

					$logQuery = $polaczenie->query("INSERT INTO logs ('text', 'data') VALUES ('Gracz o id ='".$_SESSION['id']."' zalogowal sie', '".$time."')");
					
					unset($_SESSION['blad']);
					$rezultat->free_result();
					header('Location: ../game/gra.php');
				}
				else 
				{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: zalform.php');
				}
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: zalform.php');
				
			}
			
		}
		
		$polaczenie->close();
	}
	
?>