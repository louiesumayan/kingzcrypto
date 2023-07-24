<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP; for debug

function sendHtmlEmail($toEmail, $toName, $subject, $mode, $ticket) {

    $confirmAccount = '<!DOCTYPE html>
                            <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
                            <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width,initial-scale=1">
                            <meta name="x-apple-disable-message-reformatting">
                            <title></title>
                            <!--[if mso]>
                            <noscript>
                                <xml>
                                <o:OfficeDocumentSettings>
                                    <o:PixelsPerInch>96</o:PixelsPerInch>
                                </o:OfficeDocumentSettings>
                                </xml>
                            </noscript>
                            <![endif]-->
                            <style>
                                table, td, div, h1, p {font-family: Arial, sans-serif;}
                            </style>
                            </head>
                            <body style="margin:0;padding:0;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
                                <tr>
                                <td align="center" style="padding:0;">
                                    <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                                    <tr>
                                        <td align="center" style="padding:40px 0 30px 0;background:#000000;">
                                        <img src="https://kingcryptohodl.xyz/assets/img/logo_header.png" alt="" width="300" style="height:auto;display:block;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:36px 30px 42px 30px;">
                                        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                            <tr>
                                            <td style="padding:0 0 36px 0;color:#153643;">
                                                <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Confirm Account</h1>
                                                <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Please Click teh link below to confirm your Account.
                                                <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="https://kingcryptohodl.xyz/api.php?ticket='.$ticket.'" style="color:#ee4c50;text-decoration:underline;">Confirm Account</a></p>
                                            </td>
                                            </tr>
                                            
                                        </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:30px;background:#ee4c50;">
                                        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                                            <tr>
                                            <td style="padding:0;width:50%;" align="left">
                                                <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                                                &reg; KINGS CRYPTO HOLD 2023<br/><a href="https://kingcryptohodl.xyz/" style="color:#ffffff;text-decoration:underline;"></a>
                                                </p>
                                            </td>
                                            <td style="padding:0;width:50%;" align="right">
                                                <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                                                <tr>
                                                    <td style="padding:0 0 0 10px;width:38px;">
                                                    <a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
                                                    </td>
                                                    <td style="padding:0 0 0 10px;width:38px;">
                                                    <a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                                                    </td>
                                                </tr>
                                                </table>
                                            </td>
                                            </tr>
                                        </table>
                                        </td>
                                    </tr>
                                    </table>
                                </td>
                                </tr>
                            </table>
                            </body>
                            </html>';
    $forgotpassword = '<!DOCTYPE html>
                            <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
                            <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width,initial-scale=1">
                            <meta name="x-apple-disable-message-reformatting">
                            <title></title>
                            <!--[if mso]>
                            <noscript>
                                <xml>
                                <o:OfficeDocumentSettings>
                                    <o:PixelsPerInch>96</o:PixelsPerInch>
                                </o:OfficeDocumentSettings>
                                </xml>
                            </noscript>
                            <![endif]-->
                            <style>
                                table, td, div, h1, p {font-family: Arial, sans-serif;}
                            </style>
                            </head>
                            <body style="margin:0;padding:0;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
                                <tr>
                                <td align="center" style="padding:0;">
                                    <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                                    <tr>
                                        <td align="center" style="padding:40px 0 30px 0;background:#000000;">
                                        <img src="https://kingcryptohodl.xyz/assets/img/logo_header.png" alt="" width="300" style="height:auto;display:block;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:36px 30px 42px 30px;">
                                        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                            <tr>
                                            <td style="padding:0 0 36px 0;color:#153643;">
                                                <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Forgot Password</h1>
                                                <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Please Click teh link below to Reset your Password.
                                                <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="https://kingcryptohodl.xyz/api.php?forgot='.$ticket.'" style="color:#ee4c50;text-decoration:underline;">Confirm Account</a></p>
                                            </td>
                                            </tr>
                                            
                                        </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:30px;background:#ee4c50;">
                                        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                                            <tr>
                                            <td style="padding:0;width:50%;" align="left">
                                                <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                                                &reg; KINGS CRYPTO HOLD 2023<br/><a href="https://kingcryptohodl.xyz/" style="color:#ffffff;text-decoration:underline;"></a>
                                                </p>
                                            </td>
                                            <td style="padding:0;width:50%;" align="right">
                                                <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                                                <tr>
                                                    <td style="padding:0 0 0 10px;width:38px;">
                                                    <a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
                                                    </td>
                                                    <td style="padding:0 0 0 10px;width:38px;">
                                                    <a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                                                    </td>
                                                </tr>
                                                </table>
                                            </td>
                                            </tr>
                                        </table>
                                        </td>
                                    </tr>
                                    </table>
                                </td>
                                </tr>
                            </table>
                            </body>
                            </html>';



    $mail = new PHPMailer;

    // Enable verbose debugging output
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

    // Set the mailer to use SMTP
    $mail->isSMTP();

    // SMTP configuration
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl'; // You may also use 'tls' if applicable
    $mail->SMTPAuth = true;
    $mail->Username = 'admin@kingcryptohodl.xyz';
    $mail->Password = 'kingsGuard01!';

    // Set email content as HTML
    $mail->setFrom('admin@kingcryptohodl.xyz', 'admin');
    $mail->addReplyTo('admin@kingcryptohodl.xyz', 'admin');
    $mail->addAddress($toEmail, $toName);
    $mail->Subject = $subject;

    // Set the email body as HTML
    $mail->isHTML(true);
    if($mode == 'confirm'){
        $mail->Body = $confirmAccount;
    }
    if($mode == 'forgot'){
        $mail->Body = $forgotpassword;
    }
    //$mail->Body = $htmlContent;

    // Check SMTP connection before sending the email
    if (!$mail->smtpConnect()) {
        echo 'SMTP connection failed: ' . $mail->ErrorInfo;
        return false;
    } else {
        // Now, try sending the email
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        } else {
            echo 'The email message was sent.';
            return true;
        }
    }
}


function sendHTMLMail($from,$to,$subject) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $from = "admin@kingcryptohodl.xyz";
    //$to = "kenneth.roman.b@gmail.com";
    //$subject = "HTML Email Example";
    $message = '<!DOCTYPE html>
                <!-- ... (your HTML content) ... -->
               </html>';

    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "The email message was sent.";
    } else {
        echo "The email message was not sent.";
    }
}




// Include the file containing the function
//require 'send_email.php';

// Define the email content

$toEmail = 'kenneth.roman.b@gmail.com';
$toName = 'Kenneth';
$subject = 'Checking if PHPMailer works';
//$htmlContent = file_get_contents('message.html');

// Call the function to send the HTML email
//sendHtmlEmail($toEmail, $toName, $subject, "confirm", "123456");





?>

