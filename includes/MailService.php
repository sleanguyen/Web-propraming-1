<?php
// Import PHPMailer classes
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// FUNCTION 1: Send Badge (Admin -> Student)
function sendBadgeEmail($studentEmail, $studentName, $badgeName, $reason) {
    
    $studentEmail = trim($studentEmail);

    if (!filter_var($studentEmail, FILTER_VALIDATE_EMAIL)) {
        return "Error: Invalid Email Address format [" . htmlspecialchars($studentEmail) . "]";
    }

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sleanguyen@gmail.com';   
        $mail->Password   = 'arwf vpyt otsn lpyv';      
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        // Sender & Recipient
        $mail->setFrom('sleanguyen@gmail.com', 'Student Forum Admin');
        $mail->addAddress($studentEmail, $studentName);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Congratulations! You earned the $badgeName Badge";

        $bodyContent = "
        <div style='font-family: Times New Roman, sans-serif; max-width: 600px; margin: 0 auto; border: 1px solid #ddd; border-radius: 10px; overflow: hidden;'>
            <div style='background-color: #3cbc8d; padding: 20px; text-align: center; color: white;'>
                <h1>CONGRATULATIONS!</h1>
                <p>Student Forum Achievement Unlocked</p>
            </div>
            <div style='padding: 30px; text-align: center; background-color: #f9f9f9;'>
                <p>Hi <strong>$studentName</strong>,</p>
                <p>You have been awarded a prestigious badge:</p>
                <h2 style='color: #e67e22; font-size: 24px; margin: 20px 0;'>🏅 $badgeName 🏅</h2>
                <p>Reason for award:</p>
                <blockquote style='font-style: italic; color: #555; border-left: 4px solid #3cbc8d; padding-left: 10px; margin: 20px auto; width: 80%;'>
                    \"$reason\"
                </blockquote>
                <p>Keep up the great work!</p>
                <a href='http://localhost/COMP1841/Coursework/index.php' style='display: inline-block; background-color: #443A5C; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-top: 20px;'>Visit Student Forum</a>
            </div>
            <div style='background-color: #eee; padding: 10px; text-align: center; font-size: 12px; color: #777;'>
                &copy; 2025 Student Forum. All rights reserved.
            </div>
        </div>";

        $mail->Body = $bodyContent;
        $mail->AltBody = "Congratulations $studentName! You received the $badgeName badge. Reason: $reason";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} 

// FUNCTION 2: Send Help Request (Student -> Admin)
function sendContactEmail($fromEmail, $fromName, $subject, $message) {
    
    $mail = new PHPMailer(true);

    try {
        // Server Settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sleanguyen@gmail.com';   
        $mail->Password   = 'arwf vpyt otsn lpyv';      
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        // Sender: The system sends it on behalf of the student
        $mail->setFrom('sleanguyen@gmail.com', 'Student Forum System');
        
        // Reply-To: When you click reply, it goes to the student's email
        $mail->addReplyTo($fromEmail, $fromName); 
        
        // Recipient: Master Admin (You)
        $mail->addAddress('sleanguyen@gmail.com', 'Master Admin');

        // Content
        $mail->isHTML(true);
        $mail->Subject = "[Help Request] " . $subject;
        $mail->Body    = "
        <div style='font-family: Times New Roman, sans-serif; border: 1px solid #ccc; padding: 20px; border-radius: 5px;'>
            <h2 style='color: #d35400;'>New Help Request</h2>
            <p><strong>From:</strong> $fromName ($fromEmail)</p>
            <p><strong>Subject:</strong> $subject</p>
            <hr>
            <p><strong>Message:</strong></p>
            <p style='background: #f9f9f9; padding: 15px; border-left: 4px solid #d35400;'>" . nl2br(htmlspecialchars($message)) . "</p>
        </div>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Error: " . $mail->ErrorInfo;
    }
}
?>