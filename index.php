<?php

    // Import PHPMailer classes into the global namespace 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    // Include PHPMailer classes 
    require_once 'PHPMailer/src/Exception.php';
    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    // Try sending the email
    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp-relay.sendinblue.com';            //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'username@sendinblue.com';              //SMTP username
        $mail->Password   = 'SMTPKeyValue';                         //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to
        // Recipients
        $mail->setFrom('sender@email.com', 'Sender Name'); // Sender
        $mail->addAddress('recipient@email.com', 'Recipient Name');  // Receiver
        // Content
        $mail->isHTML(true);   // Set email format to HTML
        $mail->Subject = 'Subject of the email';
        $mail->Body    = 'Message of the sender to recipient';
        $mail->AltBody = 'AltMessage of the sender to recipient';
        // Send email
        $mail->send();
        echo "Email sent.";
    } catch (Exception $e) {
        echo "ERROR";
    }
?>