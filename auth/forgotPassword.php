<?php

    require_once "../res/connect.php";
    require_once(__DIR__.'/res/PHPMailer-5.2-stable/PHPMailerAutoload.php');

    if ($polaczenie->connect_errno!=0)
    	{
    		echo "Error: ".$polaczenie->connect_errno;
    	}
    ob_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        $email = $polaczenie->real_escape_string($_POST['email']);
        $checkIfCorr = $polaczenie->query("SELECT email from uzytkownicy WHERE email='$email'");
        $checkNum = $checkIfCorr->num_rows;

        if ($checkNum != 1){

            $msg = "Podany adres nie istnieje w bazie";
            $msg2 = ["typeEr" => "error", "text" => $msg]

        } else {

            $hash = genUUID();

            $check = $polaczenie->query("UPDATE uzytkownicy SET hash='$hash' WHERE email='$email'");

            $emailMsg = "Cześć! Podobno Twoje hasło się gdzieś zgubiło. Aby je zmienić, kliknij w link poniżej<br>
            https://tokago.pl/auth/passRenew?hash=".$hash."<br>
            Nie chciałeś / chciałaś zmieniać hasła? Natychmiast skontaktuj się z adminem.";

            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;
            $mail->CharSet = "UTF-8";
            $mail->IsSMTP();
            $mail->SMTPAuth = TRUE;
            $mail->SMTPAutoTLS = false;
            $mail->SMTPSecure = 'plain';
            $mail->SMTPKeepAlive = true;
            $mail->Host = 'serwer2040614.home.pl';
            $mail->Username = $smtplog;
            $mail->Password = $smtppass;
            $mail->setFrom = 'pomoc@tokago.pl'; 
            $mail->From = 'pomoc@tokago.pl';
            $mail->FromName = 'Zespół Tokago';
            $mail->Port = 25;
            $mail->WordWrap = 50;
            $mail->Priority = 1;
            $mail->Subject = 'Resetowanie hasła';
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Body = $emailMsg;
            $mail->AltBody = $emailMsg;

            if(!$mail->send()) {
                $msg = "Wiadomość nie została wysłana.";
                $msg .= " Błąd wysyłania: " . $mail->ErrorInfo;
                $msg2 = ["typeEr" => "error", "text" => $msg]
            } else {
                $msg = 'Na podany adres email została wysłana wiadomość z linkiem do zmiany hasła';
                $msg2 = ["typeEr" => "success", "text" => $msg]
            }
            
        }

    } else {
        $msg = 'No data';
    }
ob_end_clean();
echo json_encode($msg2);
die();
?>