<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer-master/src/Exception.php";
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";

function sendEmail($email, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        // Enable Debugging
        $mail->SMTPDebug = 2; // 2 for detailed logs, set to 0 for production
        $mail->Debugoutput = 'html';

        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'gfiguidanceoffice@gmail.com'; // Use env variable for security
        $mail->Password   = 'xaxdkyuxswljmaew'; // Use env variable
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Email settings
        $mail->setFrom('gfiguidanceoffice@gmail.com', 'Guidance Office');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "$message<br><br>Best regards,<br>Guidance Office<br>GENSANTOS FOUNDATION INCORPORATION";

        $mail->send();
        echo "Email sent successfully!";
        return true;
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        return false;
    }
}


?>
