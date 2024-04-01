<?php
// Include PHPMailer autoload.php file
require 'vendor/autoload.php';

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
$mail->setFrom('inktamba@gmail.com', 'Echizen Ryouma');
$mail->addAddress('recipient@example.com');           // Add a recipient
$mail->addReplyTo('info@example.com', 'Information');

// Add attachments (optional)
$mail->addAttachment('/path/to/file');                // Add attachments
$mail->addAttachment('/path/to/image', 'new.jpg');    // Optional name

// Set email format to HTML
$mail->isHTML(true);

// Set email subject and body
$mail->Subject = 'Subject Here';
$mail->Body    = 'Body content here.';

// Send the email
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>
