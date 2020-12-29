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
    
    //if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $user_id = $_SESSION['id'];
        $ile = $polaczenie->real_escape_string($_GET['ile']);
        $money = $polaczenie->real_escape_string($_GET['money']);

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

        if($roznica<0){
            $time ="now() + INTERVAL ".$czas;
        }
        else{
            $time =$vip." + INTERVAL ".$czas;
        }
        $query = $polaczenie->query("SELECT balance FROM uzytkownicy WHERE id = '$user_id'");
        while ($row = $query->fetch_assoc()) {
            $monety =  $row['balance'];
        }
        if($monety<$money){
            die();
        }
        echo "UPDATE uzytkownicy SET vip = '$time' WHERE id = '$user_id'";
        if ($polaczenie->query("UPDATE uzytkownicy SET vip = '$time' WHERE id = '$user_id'")){
            if ($polaczenie->query("UPDATE uzytkownicy SET balance = balance - '$money' WHERE id = '$user_id'")){
                if($polaczenie->query("INSERT INTO logs VALUES (NULL, 'Gracz o id = ".$user_id." przedłużył vipa o ".$ile."!', now())")){
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
        

    //} else {
    //    echo "No data";
    //}
    
?>