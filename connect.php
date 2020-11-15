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
?>