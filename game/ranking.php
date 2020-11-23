<?php
require_once "../res/connect.php";
session_start();
try
		{
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{

			        $level = $polaczenie -> real_escape_string($_POST['level']);
			        $czas = $polaczenie -> real_escape_string($_POST['time']);
			        $id = $polaczenie -> real_escape_string($_POST['id']);

			        $rezultat = $polaczenie->query("SELECT l".$level." FROM rank WHERE id_gracza='$id'");
                    if (!$rezultat) throw new Exception($polaczenie->error);
                    $newTime = (float) $czas;
                       if($rezultat->num_rows>0){
                            $aktualny_rekord = $rezultat->fetch_assoc();

                            if((float)$aktualny_rekord["l".$level]>$newTime || (float)$aktualny_rekord["l".$level] == 0){
                            if($polaczenie->query("INSERT INTO logs VALUES (NULL, 'Gracz o id = ".$row['id']." ustanowil rekord poziomu".$aktualny_rekord["l".$level]."', now())")){
                                if ($polaczenie->query("UPDATE rank SET l".$level."='$newTime' WHERE id_gracza='$id'"))
                                {
                                    $_SESSION['udanyzapisrank']=true;
                                }
                                else
                                {
                                    throw new Exception($polaczenie->error);
                                }
                            }
                            }
				       }
				       else
				       {
                            if ($polaczenie->query("INSERT INTO rank (id_gracza, l".$level.") VALUES ('$id','$newTime')"))
                            {
                                $_SESSION['udanyzapisrank']=true;
                            }
                            else
                            {
                                throw new Exception($polaczenie->error);
                            }
				       }
				$polaczenie->close();
			}
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o zagranie w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
?>