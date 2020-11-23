<?php

    require_once "../res/connect.php";
    require_once(__DIR__.'/../res/PHPMailer-5.2-stable/PHPMailerAutoload.php');

    if ($polaczenie->connect_errno!=0)
    	{
    		echo "Error: ".$polaczenie->connect_errno;
    	}
    ob_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        $email = $polaczenie->real_escape_string($_POST['email']);
        $checkIfCorr = $polaczenie->query("SELECT id, user, email from uzytkownicy WHERE email='$email'");
        $checkNum = $checkIfCorr->num_rows;

        if ($checkNum != 1){

            $msg2 = ["typeEr" => "error", "text" => "Podany adres nie istnieje w bazie"];

        } else {

            $row = $checkIfCorr->fetch_assoc();

            $nick = $row['user'];

            $idGracza = $row['id'];

            $hash = genUUID();

            $check = $polaczenie->query("UPDATE uzytkownicy SET hash='$hash' WHERE email='$email'");


            $emailMsg = "Cześć! Podobno Twoje hasło się gdzieś zgubiło. Aby je zmienić, kliknij w link poniżej<br>
            https://tokago.pl/auth/passRenew.php?hash=".$hash."<br>
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
            $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                          <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" style="width:100%;font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
                           <head>
                            <link type="text/css" rel="stylesheet" id="dark-mode-general-link">
                            <link type="text/css" rel="stylesheet" id="dark-mode-custom-link">
                            <meta charset="UTF-8">
                            <meta content="width=device-width, initial-scale=1" name="viewport">
                            <meta name="x-apple-disable-message-reformatting">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta content="telephone=no" name="format-detection">
                            <title>Resetowanie hasła</title>
                            <!--[if (mso 16)]>
                              <style type="text/css">
                              a {text-decoration: none;}
                              </style>
                              <![endif]-->
                            <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
                            <!--[if gte mso 9]>
                          <xml>
                              <o:OfficeDocumentSettings>
                              <o:AllowPNG></o:AllowPNG>
                              <o:PixelsPerInch>96</o:PixelsPerInch>
                              </o:OfficeDocumentSettings>
                          </xml>
                          <![endif]-->
                            <style type="text/css">
                          #outlook a {
                          	padding:0;
                          }
                          .ExternalClass {
                          	width:100%;
                          }
                          .ExternalClass,
                          .ExternalClass p,
                          .ExternalClass span,
                          .ExternalClass font,
                          .ExternalClass td,
                          .ExternalClass div {
                          	line-height:100%;
                          }
                          .es-button {
                          	mso-style-priority:100!important;
                          	text-decoration:none!important;
                          }
                          a[x-apple-data-detectors] {
                          	color:inherit!important;
                          	text-decoration:none!important;
                          	font-size:inherit!important;
                          	font-family:inherit!important;
                          	font-weight:inherit!important;
                          	line-height:inherit!important;
                          }
                          .es-desk-hidden {
                          	display:none;
                          	float:left;
                          	overflow:hidden;
                          	width:0;
                          	max-height:0;
                          	line-height:0;
                          	mso-hide:all;
                          }
                          .es-button-border:hover {
                          	background:#ffffff!important;
                          	border-style:solid solid solid solid!important;
                          	border-color:#3d5ca3 #3d5ca3 #3d5ca3 #3d5ca3!important;
                          }
                          @media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:16px!important; line-height:150%!important } h1 { font-size:20px!important; text-align:center; line-height:120%!important } h2 { font-size:16px!important; text-align:left; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { font-size:20px!important } h2 a { font-size:16px!important; text-align:left } h3 a { font-size:20px!important } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:10px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:12px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } a.es-button, button.es-button { font-size:14px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } }
                          </style>
                           </head>
                           <body style="width:100%;font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
                            <div class="es-wrapper-color" style="background-color:#FAFAFA">
                             <!--[if gte mso 9]>
                          			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                          				<v:fill type="tile" color="#fafafa"></v:fill>
                          			</v:background>
                          		<![endif]-->
                             <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top">
                               <tr style="border-collapse:collapse">
                                <td valign="top" style="padding:0;Margin:0">
                                 <table cellpadding="0" cellspacing="0" class="es-header" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                                   <tr style="border-collapse:collapse">
                                    <td class="es-adaptive" align="center" style="padding:0;Margin:0">
                                     <table class="es-header-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#3D5CA3;width:600px" cellspacing="0" cellpadding="0" bgcolor="#3d5ca3" align="center">
                                       <tr style="border-collapse:collapse">
                                        <td style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#191919" bgcolor="#191919" align="left">
                                         <!--[if mso]><table style="width:560px" cellpadding="0"
                                                  cellspacing="0"><tr><td style="width:280px" valign="top"><![endif]-->
                                         <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                           <tr style="border-collapse:collapse">
                                            <td class="es-m-p20b" align="left" style="padding:0;Margin:0;width:280px">
                                             <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                               <tr style="border-collapse:collapse">
                                                <td align="left" style="padding:0;Margin:0;font-size:0px"><a target="_blank" href="https://tokago.pl" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#1376C8"><img class="adapt-img" src="https://tokago.pl/res/photo/logo.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="100"></a></td>
                                               </tr>
                                             </table></td>
                                           </tr>
                                         </table>
                                         <!--[if mso]></td><td style="width:20px"></td><td style="width:260px" valign="top"><![endif]-->
                                         <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                           <tr style="border-collapse:collapse">
                                            <td align="left" style="padding:0;Margin:0;width:260px">
                                             <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                               <tr style="border-collapse:collapse">
                                                <td align="left" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:63px;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:95px;color:#FFFFFF"><strong>TOKAGO</strong></p></td>
                                               </tr>
                                             </table></td>
                                           </tr>
                                         </table>
                                         <!--[if mso]></td></tr></table><![endif]--></td>
                                       </tr>
                                     </table></td>
                                   </tr>
                                 </table>
                                 <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                   <tr style="border-collapse:collapse">
                                    <td style="padding:0;Margin:0;background-color:#FAFAFA" bgcolor="#fafafa" align="center">
                                     <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                       <tr style="border-collapse:collapse">
                                        <td style="padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:40px;background-color:transparent;background-position:left top" bgcolor="transparent" align="left">
                                         <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                           <tr style="border-collapse:collapse">
                                            <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                             <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top" width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                               <tr style="border-collapse:collapse">
                                                <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0"><img src="https://tokago.pl/res/photo/email.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="175"></td>
                                               </tr>
                                               <tr style="border-collapse:collapse">
                                                <td align="center" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px"><h1 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#333333"><strong>Zapomniałeś/aś swojego </strong></h1><h1 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#333333"><strong>&nbsp;hasła?</strong></h1></td>
                                               </tr>
                                               <tr style="border-collapse:collapse">
                                                <td align="center" style="padding:0;Margin:0;padding-left:40px;padding-right:40px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;line-height:24px;color:#666666">Witaj '. $nick.',</p></td>
                                               </tr>
                                               <tr style="border-collapse:collapse">
                                                <td align="center" style="padding:0;Margin:0;padding-right:35px;padding-left:40px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;line-height:24px;color:#666666">Pojawiła się prośba o zmianę hasła!</p></td>
                                               </tr>
                                               <tr style="border-collapse:collapse">
                                                <td align="center" style="padding:0;Margin:0;padding-top:25px;padding-left:40px;padding-right:40px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;line-height:24px;color:#666666">Kliknij w przycisk poniżej aby dokonać zmiany hasła. W wypadku, gdy nie została do nas wysłana prośba o zmianę hasła, prosimy o zignorowanie tego emaila..</p></td>
                                               </tr>
                                               <tr style="border-collapse:collapse">
                                                <td align="center" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:40px;padding-bottom:40px"><span class="es-button-border" style="border-style:solid;border-color:#3D5CA3;background:#FFFFFF;border-width:2px;display:inline-block;border-radius:10px;width:auto"><a href="https://tokago.pl/auth/passRenew.php?hash='.$hash.'" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:14px;color:#3D5CA3;border-style:solid;border-color:#FFFFFF;border-width:15px 20px 15px 20px;display:inline-block;background:#FFFFFF;border-radius:10px;font-weight:bold;font-style:normal;line-height:17px;width:auto;text-align:center">RESETUJ HASŁO</a></span></td>
                                               </tr>
                                             </table></td>
                                           </tr>
                                         </table></td>
                                       </tr>
                                       <tr style="border-collapse:collapse">
                                        <td align="left" style="Margin:0;padding-top:5px;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                         <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                           <tr style="border-collapse:collapse">
                                            <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                             <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                               <tr style="border-collapse:collapse">
                                                <td align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;line-height:21px;color:#666666">Kontakt: pomoc@tokago.pl</p></td>
                                               </tr>
                                             </table></td>
                                           </tr>
                                         </table></td>
                                       </tr>
                                     </table></td>
                                   </tr>
                                 </table>
                                 <table class="es-footer" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                                   <tr style="border-collapse:collapse">
                                    <td style="padding:0;Margin:0;background-color:#FAFAFA" bgcolor="#fafafa" align="center">
                                     <table class="es-footer-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
                                       <tr style="border-collapse:collapse">
                                        <td style="Margin:0;padding-top:10px;padding-left:20px;padding-right:20px;padding-bottom:30px;background-color:#33495E" bgcolor="#33495e" align="left">
                                         <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                           <tr style="border-collapse:collapse">
                                            <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                             <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                               <tr style="border-collapse:collapse">
                                                <td align="left" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px"><h2 style="Margin:0;line-height:19px;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:16px;font-style:normal;font-weight:normal;color:#FFFFFF"><b>Masz pytania?</b></h2></td>
                                               </tr>
                                               <tr style="border-collapse:collapse">
                                                <td align="left" style="padding:0;Margin:0;padding-bottom:5px"><font color="#ffffff" style="font-size:14px">Jesteśmy po to aby ci pomóc, skontaktuj się z nami przez email.</font></td>
                                               </tr>
                                             </table></td>
                                           </tr>
                                         </table></td>
                                       </tr>
                                     </table></td>
                                   </tr>
                                 </table>
                                 <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                   <tr style="border-collapse:collapse">
                                    <td style="padding:0;Margin:0;background-color:#FAFAFA" bgcolor="#fafafa" align="center">
                                     <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" bgcolor="transparent" align="center">
                                       <tr style="border-collapse:collapse">
                                        <td align="left" style="padding:0;Margin:0">
                                         <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                           <tr style="border-collapse:collapse">
                                            <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                             <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                               <tr style="border-collapse:collapse">
                                                <td style="padding:0;Margin:0">
                                                 <table class="es-menu" width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                   <tr class="links" style="border-collapse:collapse">
                                                    <td style="Margin:0;padding-left:5px;padding-right:5px;padding-top:10px;padding-bottom:10px;border:0" id="esd-menu-id-0" width="33.33%" valign="top" bgcolor="transparent" align="center"><a target="_blank" href="https://tokago.pl/auth/zalform.php" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;font-size:14px;text-decoration:none;display:block;color:#3D5CA3">Zaloguj się</a></td>
                                                    <td style="Margin:0;padding-left:5px;padding-right:5px;padding-top:10px;padding-bottom:10px;border:0;border-left:1px solid #333333" id="esd-menu-id-1" esdev-border-color="#3d5ca3" width="33.33%" valign="top" bgcolor="transparent" align="center"><a target="_blank" href="https://tokago.pl/regulamin.html" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;font-size:14px;text-decoration:none;display:block;color:#3D5CA3">Regulamin</a></td>
                                                    <td style="Margin:0;padding-left:5px;padding-right:5px;padding-top:10px;padding-bottom:10px;border:0;border-left:1px solid #333333" id="esd-menu-id-2" esdev-border-color="#3d5ca3" width="33.33%" valign="top" bgcolor="transparent" align="center"><a target="_blank" href="https://tokago.pl/credits.html" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;font-size:14px;text-decoration:none;display:block;color:#3D5CA3">Podziękowania</a></td>
                                                   </tr>
                                                 </table></td>
                                               </tr>
                                               <tr style="border-collapse:collapse">
                                                <td align="center" style="padding:0;Margin:0;font-size:0">
                                                 <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                   <tr style="border-collapse:collapse">
                                                    <td style="padding:0;Margin:0;border-bottom:20px solid #333333;background:none;height:1px;width:100%;margin:0px"></td>
                                                   </tr>
                                                 </table></td>
                                               </tr>
                                             </table></td>
                                           </tr>
                                         </table></td>
                                       </tr>
                                     </table></td>
                                   </tr>
                                 </table></td>
                               </tr>
                             </table>
                            </div>
                           </body>
                          </html>';
            $mail->AltBody = $emailMsg;

            if(!$mail->send()) {
                if($polaczenie->query("INSERT INTO logs VALUES (NULL, 'Gracz o id =". $idGracza." wyslal prosbe o zmiane hasla - na jego adres emial
                  NIE zostala wyslana wiadomosc z linkiem - blad systemu', now())")){
                $msg2 = ["typeEr" => "error", "text" => "Wiadomość nie została wysłana: ". $mail->ErrorInfo];
                  }
            } else {
                if($polaczenie->query("INSERT INTO logs VALUES (NULL, 'Gracz o id =".$idGracza." wyslal prosbe o zmiane hasla - na jego adres emial
                  zostala wyslana wiadomosc z linkiem', now())")){
                $msg2 = ["typeEr" => "success", "text" => "Na podany adres email została wysłana wiadomość z linkiem do zmiany hasła."];
                  }
            }
            
        }

    } else {
        $msg = 'No data';
    }
ob_end_clean();
echo json_encode($msg2);
die();
?>