<?php

require_once '../../utils/regex.php';
require_once '../../utils/messages.php';
require_once '../../utils/functions.php';
require_once '../../models/usersModel.php';

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;


$user = new Users;

class sendEmail
{

    function send($code)
    {
        require 'PHPMailer/src/Exception.php';

        require 'PHPMailer/src/PHPMailer.php';

        require 'PHPMailer/src/SMTP.php';

        require '../../vendor/autoload.php';

        // create object of PHPMailer class with boolean parameter which sets/unsets exception.

        $mail = new PHPMailer(true);
        $code = '';
        function generateVerificationCode($length = 6)
        {
            $characters = '0123456789';
            $code = '';
            for ($i = 0; $i < $length; $i++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $code;
        }

        //     try {

        //         // $mail->isSMTP(); // using SMTP protocol                                     

        //         // $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 

        //         // $mail->SMTPAuth = true;  // enable smtp authentication                             

        //         // $mail->Username = 'mtjosue31@gmail.com';  // sender gmail host              

        //         // $mail->Password = 'amishua97.'; // sender gmail host password                          

        //         $mail->SMTPSecure = 'tls';  // for encrypted connection                           
        //         $mail->SMTPDebug = SMTP::DEBUG_OFF; // Set to DEBUG_SERVER for debugging
        //         $mail->isSMTP();
        //         $mail->Host = 'live.smtp.mailtrap.io'; // Mailtrap SMTP server host 
        //         $mail->SMTPAuth = true;
        //         $mail->Username = 'mtjosue31@gmail.com'; // Your Mailtrap SMTP username
        //         $mail->Password = 'Luta1812.'; // Your Mailtrap SMTP password
        //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        //         $mail->Port = 2525;   // port for SMTP     

        //         $mail->isHTML(true);

        //         $mail->setFrom('mtjosue31@gmail.com', "MelodyTown"); // sender's email and name

        //         $mail->addAddress($user->getEmail(), "Receiver");  // receiver's email and name

        //         $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        //         $mail->Subject = 'Email verification';

        //         $mail->Body = 'Please click this button to verify your account: <a href=http://melodytown/verify?code=' . $code . '>Verify</a>';



        //         $mail->send();

        //         echo 'Message has been sent';

        //     } catch (Exception $e) { // handle error.

        //         echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

        //     }

        // }

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Your SMTP server (e.g., Gmail SMTP)
            $mail->SMTPAuth = true;              // Enable SMTP authentication
            $mail->Username = 'mtjosue31@gmail.com';  // Your email address
            $mail->Password = 'amishua97.';   // Your email password (consider using app password)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 2525;               // TCP port to connect to

            // Recipients
            $mail->setFrom('mtjosue31@gmail.com', 'Josue MT');
            $mail->addAddress($user->getEmail(), $user->getUsername());  // Add the user's email

            // Content
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Verify Your Email';

            // Create a unique verification link or token
            $verificationCode = uniqid(); // You can generate a more complex token if needed

            // Save the verification code to the user's record in the database (not shown here)

            $verificationLink = "http://melodytown/verification?code=$verificationCode";
            $mail->Body = "Hi". $user->getUsername() . ",<br><br>Thank you for registering. Please click the link below to verify your email address:<br><br>
                          <a href='$verificationLink'>" . $code . "Verify Email</a>";

            // Send email
            $mail->send();
            echo 'Verification email sent.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}


?>