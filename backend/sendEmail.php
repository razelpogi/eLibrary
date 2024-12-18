<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php'; // Adjust if the path to the autoloader is different

/**
 * Sends a confirmation email with PHPMailer.
 *
 * @param string $recipientEmail The recipient's email address.
 * @param string $bookTitle The title of the reserved book.
 * @param string $bookAuthor The author of the reserved book.
 * @param string $reservationDate The reservation date.
 * @return bool True if the email is sent successfully, false otherwise.
 */
function sendConfirmationEmail($recipientEmail, $bookTitle, $bookAuthor, $reservationDate) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                    // Disable debug output
        $mail->isSMTP();                                       // Use SMTP
        $mail->Host       = 'smtp.gmail.com';                  // SMTP server
        $mail->SMTPAuth   = true;                              // Enable SMTP authentication
        $mail->Username   = 'camonirazel01@gmail.com';         // Admin email
        $mail->Password   = 'hwuc ffek wqqy lhkt';             // Admin email password (App Password for Gmail)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    // Encryption protocol
        $mail->Port       = 587;                               // SMTP port

        // Sender and Recipient
        $mail->setFrom('camonirazel01@gmail.com', 'Library Admin'); // Sender email and name
        $mail->addAddress('rocellacondiman@gmail.com');                    // Recipient email

        // Email Content
        $mail->isHTML(true);                                   // Enable HTML content
        $mail->Subject = 'Reservation Confirmed';              // Email subject
        $mail->Body    = "Hello,<br><br>Your reservation for the following book has been confirmed:<br><br>" . 
                        //  "Title: $bookTitle<br>" . 
                        //  "Author: $bookAuthor<br>" . 
                         "Reservation Date: $reservationDate<br><br>" . 
                         "Thank you for using our library system!<br>Library Team";
        $mail->AltBody = "Hello,\n\nYour reservation for the following book has been confirmed:\n\n" . 
                        //  "Title: $bookTitle\n" . 
                        //  "Author: $bookAuthor\n" . 
                         "Reservation Date: $reservationDate\n\n" . 
                         "Thank you for using our library system!";

        // Send the email
        $mail->send();
        return true; // Success
    } catch (Exception $e) {
        // Display error message (optional for debugging)
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false; // Failure
    }
}

// Only run the following code if the form is submitted (POST method)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from form submission
   
    $recipientEmail = $_POST['recipientEmail'];
    $bookTitle = $_POST['bookTitle'];
    $bookAuthor = $_POST['bookAuthor'];
    $reservationDate = date('Y-m-d H:i:s');  // Current reservation date and time (you can replace it with the actual reservation date if needed)

    // Call the function to send the confirmation email
    if (sendConfirmationEmail($recipientEmail, $bookTitle, $bookAuthor, $reservationDate)) {
        echo 'Email sent successfully!';
    } else {
        echo 'Failed to send email.';
    }
}
?>
