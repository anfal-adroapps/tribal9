<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.googlemail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'anfal.androapps@gmail.com';                     //SMTP username
        $mail->Password   = 'google@1234';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('anfal.androapps@gmail.com', 'Saroja Pharma Industries India Ltd.');
        $mail->addAddress('anfal.androapps@gmail.com', 'Saroja Pharma Industries India Ltd.');     //Add a recipient

    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Subject: '.$_REQUEST['subject'];
        $mail->Body    = "name:" .$_REQUEST['name'] . "<br>" .  "Email : " . $_REQUEST['email'] . "<br>" ."Message : " . $_REQUEST['message'] ;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        // $message = "Name:" .$_REQUEST['name'] . "\n" ."Message : " . $_REQUEST['message'];
    
        $mail->send();


        // Reply To User
        //Recipients
        $mail->setFrom('anfal.androapps@gmail.com', 'Saroja Pharma Industries India Ltd.');
        $mail->addAddress($_REQUEST['email'], $_REQUEST['name']);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Thank You For Contacting Saroja Pharma Industries India Ltd.';
        $mail->Body    = "Hello " .$_REQUEST['name'] . ", <br> Thank You For Contacting Saroja Pharma Industries India Ltd.";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();

        echo 'Message has been sent';
        echo "<meta http-equiv='Refresh' content='3; url=https://anfal-adroapps.github.io/tribal9/' />";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }