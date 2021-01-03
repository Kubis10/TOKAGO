<?php 
    session_start();
    require_once "../../res/connect.php";
    
    if ($polaczenie->query("UPDATE uzytkownicy SET balance = balance + 4 WHERE vip>=now()")){
        echo "yes";
    }
?>