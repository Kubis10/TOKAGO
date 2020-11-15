<?php
    require_once "connect.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $uname = $link->real_escape_string($_POST['uname']);
        $pass1 = $link->real_escape_string($_POST['pass1']);
        $pass2 = $link->real_escape_string($_POST['pass2']);

        if ($pass1 === $pass2){

            $hashedPassword = password_hash($pass1, PASSWORD_DEFAULT);
            if(password_verify($pass1, $hashedPassword)){
                $update = $link->query("UPDATE uzytkownicy SET pass='$pass1' WHERE user='$uname'");
                echo 'Hasło zostało zmienione!';
            } else {
                echo 'Wystąpił problem, skontaktuj się z adminem w celu ręcznej zmiany hasła.';
            }

        } else {
            echo 'Hasła nie są takie same';
        }

    } else {
        echo "No data";
    }
?>