<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

// les models de site et les utils
require_once '../../models/topicsModel.php';
require_once '../../models/usersModel.php';
require_once '../../models/statusModel.php';
require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';


class sendMail
{
    
function confirmedEmail($email, $username)
    {
        $mail = new PHPMailer(true);
        $users = new Users;

        try {
            // parametres de serveur
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // serveur SMTP  (e.g., Gmail SMTP)
            $mail->SMTPAuth = true;              // autorisation de SMTP authentication
            $mail->Username = 'mtjosue31@gmail.com';  // mon email address
            $mail->Password = 'rzuhdpoopwczlaad';   // mon email password (considerer que je l'utilise)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // autorisation de TLS encryption, `ssl` est aussi accepte
            $mail->Port = 587;               // port TCP 
            // TCP port to connect to
            // Disable SSL certificate verification (quick fix)
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            // Recipients
            $mail->setFrom('mtjosue31@gmail.com', 'MelodyTown');
            $mail->addAddress($email, $username);  // email de l'utilisateur

            // Content
            $mail->isHTML(true);  // remettre le format d'email en html
            $mail->Subject = 'Compte verifié';


            // Sauvegarde de token

            $verificationLink = "http://melodytown/accueil?account verified=Oui?";
            $mail->Body = "Salut $username,<br><br>Merci d'avoir verifié votre compte.<br><br>
                            <a href='$verificationLink'><br>Enjoy the discussions!</a>";

            // envoie d'email
            $mail->send();
            echo 'Verification email sent.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}



class delMail
{
    
function deletedUser($email, $username)
    {
        $mail = new PHPMailer(true);
        $deletedUser = new Users;

        try {
            // parametres de serveur
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // serveur SMTP  (e.g., Gmail SMTP)
            $mail->SMTPAuth = true;              // autorisation de SMTP authentication
            $mail->Username = 'mtjosue31@gmail.com';  // mon email address
            $mail->Password = 'rzuhdpoopwczlaad';   // mon email password (considerer que je l'utilise)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // autorisation de TLS encryption, `ssl` est aussi accepte
            $mail->Port = 587;               // port TCP 
            // TCP port to connect to
            // Disable SSL certificate verification (quick fix)
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            // Recipients
            $mail->setFrom('mtjosue31@gmail.com', 'MelodyTown');
            $mail->addAddress($email, $username);  // email de l'utilisateur

            // Content
            $mail->isHTML(true);  // remettre le format d'email en html
            $mail->Subject = 'Compte supprimé';


            // Sauvegarde de token

            $verificationLink = "http://melodytown/verification?account deleted=Oui?";
            $mail->Body = "Salut $username,<br><br>Nous sommes désolé de vous voir partir.<br>
            Votre compte a bien été supprimé <br>
                            <a href='$verificationLink'><br> Au revoir!</a>";

            // envoie d'email
            $mail->send();
            echo 'Verification email sent.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}




?>