 <?php
    // /**
    //  * This example shows making an SMTP connection with authentication.
    //  */

    // //SMTP needs accurate times, and the PHP time zone MUST be set
    // //This should be done in your php.ini, but this is how to do it if you don't have access to that
    date_default_timezone_set('Asia/Bangkok');

    require 'PHPMailer/PHPMailerAutoload.php';

   
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP
    
    $mail->isSMTP();

    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );
    
    $mail->SMTPDebug = 2;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host = "med-tu.org";
    // $mail->Host = "mail.med-tu.org";
    //Set the SMTP port number - likely to be 25, 465 or 587
    // $mail->SMTPAuth = true;  
    $mail->Port = 587;
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication
    $mail->Username = "techno@med-tu.org";
    //Password to use for SMTP authentication
    $mail->Password = "tmt@33*2562";
    //Set who the message is to be sent from
    $mail->setFrom('techno@med-tu.org', 'test email for send');
    //Set who the message is to be sent to
    $mail->addAddress('techno.softwaredev@gmail.com', 'techno software');
    //Set the subject line
    $mail->Subject = 'techno@med-tu.org test email';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
    $mail->msgHTML("Test email by medtu.ec@gmail.com");

    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        if (save_mail($mail)) {
            echo "Message saved!";
        }
        // echo '<script type="text/javascript">';
        // echo 'alert("email is sent success!");';

    
        // // echo 'window.location.href = "index.php";';
        // echo '</script>';
    }