<?php
    require_once "../res/connect.php";

    ob_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $polaczenie->real_escape_string($_POST['id']);

        if($qr = $polaczenie->query("SELECT max_lvl FROM uzytkownicy WHERE id='$id'")){
            $row = $qr->fetch_assoc();
            $zwrotka = $row['max_lvl'];
            $response=["success"=>"tak", "max_lvl"=>$zwrotka];
        } else {
            $response=["success"=>"nie", "max_lvl"=>NULL];
        }
        ob_end_clean();
        echo json_encode($response);

    } else {
        echo "No data";
    }

    
?>