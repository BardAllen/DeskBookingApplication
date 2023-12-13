// send-email.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailerAutoload.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';  // Specify your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'brad.allen@live.co.uk'; // Specify your SMTP username
    $mail->Password = 'Barneyboy101101!!'; // Specify your SMTP password
    $mail->SMTPSecure = 'tls'; // You can use 'tls' or 'ssl'
    $mail->Port = 587; // Adjust the port as needed

    // Recipients
    $mail->setFrom('your_email@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');

    // Content
    $mail->isHTML(false);
    $mail->Subject = 'Desk Booking Confirmation';
    $mail->Body = "Desk booked at $office, Floor $floor, Desk $selectedDeskNumber on $startDate at $startTime to $endTime.";

    // Send the email
    $mail->send();
    echo json_encode(['status' => 'Email sent successfully']);
} catch (Exception $e) {
    echo json_encode(['status' => 'Failed to send email', 'error' => $mail->ErrorInfo]);
}