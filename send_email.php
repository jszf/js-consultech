<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Adjust these paths based on where you placed the PHPMailer files
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = strip_tags(trim($_POST["name"]));
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    $mail = new PHPMailer(true);

    try {
        // --- Server Settings ---
        // $mail->SMTPDebug = 2;                      // Enable for troubleshooting
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';         // Set your SMTP server (e.g., smtp.gmail.com)
        $mail->SMTPAuth   = true;
        $mail->Username   = 'serebejosef@gmail.com';   // Your email address
        $mail->Password   = 'fgsrxbmkhibuecbj';      // Your email password (or App Password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // --- Recipients ---
        $mail->setFrom('your-email@gmail.com', 'JsConsult Contact Form');
        $mail->addAddress('hello@jsconsultech.com');  // Where you want to receive emails
        $mail->addReplyTo($email, $name);

        // --- Content ---
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission from $name";
        $mail->Body    = "
            <h3>New Message Received</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        $mail->send();
        
        // Redirect back with success message
        header("Location: contact.php?sent=1");
        exit;

    } catch (Exception $e) {
        // Redirect back with error message
        header("Location: contact.php?sent=0");
        exit;
    }
} else {
    header("Location: contact.php");
    exit;
}