<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once('PHPMailer/PHPMailerAutoload.php');
    $mail = new PHPMailer(true);
    $mail->IsHTML(true);
    $mail->SetLanguage("fr", 'PHPMailer/language/');
    $mail->charSet = "UTF-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "mail.infomaniak.com";
    $mail->Port = 587;
    $mail->Username = "noreply@lacalifornie-collonge-bellerive.ch";
    $mail->Password = "vqQymU6-bRhr";

    $nom     = filter_input(INPUT_POST, 'nom');
    $tel     = filter_input(INPUT_POST, 'tel');
    $email   = filter_input(INPUT_POST, 'email');
    $message = filter_input(INPUT_POST, 'message');

    $name    = "LA CALIFORNIE";       //website name
    $color1  = "#214540";             //h1 background color
    $color2  = "#FFFFFF";             //h1 text color
    $color3  = "#E9E9E9";             //body color

    $subject = mb_convert_encoding("$name - CONTACT", "ISO-8859-1"); //subject name

    $msg = "
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
                    <td style='font-family: Arial, Helvetica, Verdana, sans-serif; padding: 10px; text-align: left; background-color: #FFFFFF; border: solid 1px $color3;'>$nom</td>
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
                <tr><td colspan='4' style='background-color: $color3; border: none;'>&nbsp;</td></tr>
                <tr>
                    <td style='padding: 10px; background-color: $color3;'></td>
                    <td colspan='2' style='font-family: Arial, Helvetica, Verdana, sans-serif; padding: 10px; text-align: left; background-color: $color1; color: $color2'><b>Message :</b></td>
                    <td style='padding: 10px; background-color: $color3;'></td>
                </tr>
                <tr>
                    <td style='padding: 10px; background-color: $color3;'></td>
                    <td colspan='2' style='font-family: Arial, Helvetica, Verdana, sans-serif; padding: 10px; text-align: left; background-color: #FFFFFF; border: solid 1px $color3;'>$message</td>
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
    ";

    $msg = mb_convert_encoding($msg, "ISO-8859-1");

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $output = json_encode(array('type'=>'error', 'text' => 'Veuillez entrer une adresse email valide !'));
        die($output);
    }

    /*************************************************/

    $mail->AddAddress("ld@veyrat-sarasin.ch", "$name");
    $mail->AddAddress("sv@veyrat-sarasin.ch", "$name");
    $mail->AddBCC("test@atelier-vert-pomme.com", "$name");

    /*************************************************/

    $mail->SetFrom("noreply@lacalifornie-collonge-bellerive.ch", "$name");
    $mail->Subject = $subject;
    $mail->Body = $msg;

    try { $mail->Send(); $_SESSION['is_sent'] = "yes"; }
    catch(Exception $e) { $_SESSION['is_sent'] = "no"; }
}

else { $_SESSION['is_sent'] = "no"; }

ob_start();
while (ob_get_status()) { ob_end_clean(); }
header("Location: https://".$_SERVER['HTTP_HOST']."/");
?>