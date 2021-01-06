<?php
    require_once "../res/connect.php";

    ob_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = $polaczenie->real_escape_string($_POST['email']);
        $pass1 = $polaczenie->real_escape_string($_POST['pass1']);
        $pass2 = $polaczenie->real_escape_string($_POST['pass2']);

        $hashedPassword = password_hash($pass1, PASSWORD_DEFAULT);

        if ($pass1 === $pass2){
            if(password_verify($pass1, $hashedPassword)){
                if( $polaczenie->query("UPDATE uzytkownicy SET pass='$hashedPassword' WHERE email='$email'")){
                    $response = ["success"=>"tak", "text"=>"Hasło zostało zmienione pomyślnie"];
                } else {
                    $response = ["success"=>"nie", "text"=>"Wystąpił problem, skontaktuj się z adminem w celu ręcznej zmiany hasła."];
                }
                
            } else {
                $response = ["success"=>"nie", "text"=>"Wystąpił problem, skontaktuj się z adminem w celu ręcznej zmiany hasła."];
            }

        } else {
            $response = ["success"=>"nie", "text"=>"Hasła nie są takie same."];
        }

        ob_end_clean();
        echo json_encode($response);

    } else {
        echo "No data";
    }

    
?>
