<?php
require_once "../res/connect.php";
session_start();
try	{
		if ($polaczenie->connect_errno!=0)		{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
					
			        $level = $polaczenie -> real_escape_string($_POST['level']);
					$id = $polaczenie -> real_escape_string($_POST['id']);

					$qr = $polaczenie->query("SELECT max_lvl FROM uzytkownicy WHERE id='$id'");
					$row = $qr->fetch_assoc();

					$maxLvl = intval($row['max_lvl']);


					if(intval($level) > $maxLvl){
						if ($polaczenie->query("UPDATE uzytkownicy SET lvl='$level', max_lvl='$level' WHERE id='$id'")){
							$_SESSION['udanyzapis']=true;
						} else {
							throw new Exception($polaczenie->error);
						}	
					}else {
						if ($polaczenie->query("UPDATE uzytkownicy SET lvl='$level' WHERE id='$id'"))
						{
							$_SESSION['udanyzapis']=true;
						}
						else
						{
							throw new Exception($polaczenie->error);
						}
					}
					
				}

				$polaczenie->close();
			}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o zagranie w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
?>