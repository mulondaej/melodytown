<?php
// Include PHPMailer autoload.php file
require_once '../../models/usersModel.php';
  

$user = new Users;
$userAccount = $user->getById();

// Create a new PHPMailer instance
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Set up SMTP
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mtjosu31@gmail.com';           // SMTP username
$mail->Password = 'Triplej15.';              // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

// Set up email
$mail->setFrom('inktamba@gmail.com', 'EJMT');
$mail->addAddress($userAccount->email);           // Add a recipient
$mail->addReplyTo('kibongatsho31@gmail.com', 'Information');

// Add attachments (optional)
$mail->addAttachment('/path/to/file');                // Add attachments
$mail->addAttachment('/path/to/image', 'new.jpg');    // Optional name

// Set email format to HTML
$mail->isHTML(true);

// Set email subject and body
$mail->Subject = 'Email verification';
$mail->Body    = 'Please click this button to verify your account: <a href=http://melodytown/verify?code=' . $code . '>Verify</a>';

// Send the email
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>
