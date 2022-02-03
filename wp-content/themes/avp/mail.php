<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titre   = filter_input(INPUT_POST, 'titre');
    $nom     = filter_input(INPUT_POST, 'nom');
    $prenom  = filter_input(INPUT_POST, 'prenom');
    $tel     = filter_input(INPUT_POST, 'telephone');
    $email   = filter_input(INPUT_POST, 'email');
    $message = filter_input(INPUT_POST, 'message');

    /*************************************************/

    $name    = "Taoù Martigny";  //website name
    $color1  = "#648080";        //h1 background color
    $color2  = "#FFFFFF";        //h1 text color
    $color3  = "#A2B6B5";        //body color

    /*************************************************/

    $subject = mb_convert_encoding("$name - CONTACT", "ISO-8859-1"); //subject name

    $msg = "<html>
            <head>
                <title>HTML email</title>
            </head>
            <body>
            <table style='border-collapse: collapse; margin: auto; padding: 0; background-color: $color3; text-align: center; width: 660px;'>
                <tr><td colspan='4' style='background-color: $color3; border: none;'>&nbsp;</td></tr>
                <tr>
                    <td style='background-color: $color3; border: none;'></td>
                    <td colspan='2' style='font-family: Arial, Helvetica, Verdana, sans-serif; background-color: $color1; font-size: 24px; text-align: center; color: $color2; padding: 15px;'><b>$name - CONTACT</b></td>
                    <td style='background-color: $color3; border: none;'></td>
                </tr>
                <tr><td colspan='4' style='background-color: $color3; border: none;'>&nbsp;</td></tr>
                <tr>
                    <td style='padding: 10px; background-color: $color3;'></td>
                    <td style='font-family: Arial, Helvetica, Verdana, sans-serif; padding: 10px; text-align: left; background-color: #FFFFFF; border: solid 1px $color3;'><b>Nom</b></td>
                    <td style='font-family: Arial, Helvetica, Verdana, sans-serif; padding: 10px; text-align: left; background-color: #FFFFFF; border: solid 1px $color3;'>($titre) $nom $prenom</td>
                    <td style='padding: 10px; background-color: $color3;'></td>
                </tr>
                <tr>
                    <td style='padding: 10px; background-color: $color3;'></td>
                    <td style='font-family: Arial, Helvetica, Verdana, sans-serif; padding: 10px; text-align: left; background-color: #FFFFFF; border: solid 1px $color3;'><b>E-mail</b></td>
                    <td style='font-family: Arial, Helvetica, Verdana, sans-serif; padding: 10px; text-align: left; background-color: #FFFFFF; border: solid 1px $color3;'>$email</td>
                    <td style='padding: 10px; background-color: $color3;'></td>
                </tr>
                <tr>
                    <td style='padding: 10px; background-color: $color3;'></td>
                    <td style='font-family: Arial, Helvetica, Verdana, sans-serif; padding: 10px; text-align: left; background-color: #FFFFFF; border: solid 1px $color3;'><b>Téléphone</b></td>
                    <td style='font-family: Arial, Helvetica, Verdana, sans-serif; padding: 10px; text-align: left; background-color: #FFFFFF; border: solid 1px $color3;'>$tel</td>
                    <td style='padding: 10px; background-color: $color3;'></td>
                </tr>
                <tr>
                    <td style='padding: 10px; background-color: $color3;'></td>
                    <td style='font-family: Arial, Helvetica, Verdana, sans-serif; padding: 10px; text-align: left; background-color: #FFFFFF; border: solid 1px $color3;'><b>Message</b></td>
                    <td style='font-family: Arial, Helvetica, Verdana, sans-serif; padding: 10px; text-align: left; background-color: #FFFFFF; border: solid 1px $color3;'>$message</td>
                    <td style='padding: 10px; background-color: $color3;'></td>
                </tr>
                <tr><td colspan='4' style='background-color: $color3; border: none;'>&nbsp;</td></tr>
            </table>

        <style>
            body {
                text-align: center;
                margin: 30px auto;
            }
            td { padding: 10px; }
        </style>
        </body>
        </html>
    ";

    /*************************************************/

    $to = "";
    $subject = $name . " - CONTACT";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: noreply@taou-martigny.ch' . "\r\n";
    $headers .= 'Bcc: test@test.com' . "\r\n";

    if(mail($to,$subject,$msg,$headers)) {
        $_SESSION['is_sent'] = "yes";
    } else {
        $_SESSION['is_sent'] = "no";
    }

    /*************************************************/

} else { $_SESSION['is_sent'] = "no"; }

ob_start();
while (ob_get_status()) { ob_end_clean(); }

header("Location: https://".$_SERVER['HTTP_HOST']."/succes/");
?>