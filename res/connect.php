<?php

	$host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "gra";

    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

    $smtplog = 'pomoc@tokago.pl';
    $smtppass = 'Qi1wWqpTD';

    function genUUID() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    function ifVIP($vip){
        $dataczas = new DateTime();
        $koniec = DateTime::createFromFormat('Y-m-d H:i:s', $vip);
        $koniecStr =  $koniec->format("Y-m-d H:i:s");
      
        $roznica = $dataczas->diff($koniec);
  
        $roznica = $roznica->format('%R%a');
  
        $difference = intval($roznica);
  
  
        if($difference <= 0){
          return false;
        }
        else{
          return true;
        }
      }
?>