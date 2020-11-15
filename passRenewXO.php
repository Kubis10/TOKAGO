<?php
    require_once "connect.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $uname = $polaczenie->real_escape_string($_POST['uname']);
        $pass1 = $polaczenie->real_escape_string($_POST['pass1']);
        $pass2 = $polaczenie->real_escape_string($_POST['pass2']);

        if ($pass1 === $pass2){

            $hashedPassword = password_hash($pass1, PASSWORD_DEFAULT);
            if(password_verify($pass1, $hashedPassword)){
                $update = $polaczenie->query("UPDATE uzytkownicy SET pass='$hashedPassword' WHERE user='$uname'");
                header('Location: zalform.php');
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