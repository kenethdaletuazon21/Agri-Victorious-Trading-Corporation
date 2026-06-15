<?php
/**
 * Email Handler for Contact Form
 * To enable email functionality, configure your email settings below
 */

// Email configuration
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'your-email@gmail.com');
define('SMTP_PASS', 'your-app-password');
define('FROM_EMAIL', COMPANY_EMAIL);

/**
 * Send Contact Form Email
 * @param string $name - Visitor name
 * @param string $email - Visitor email
 * @param string $phone - Visitor phone
 * @param string $subject - Message subject
 * @param string $message - Message content
 * @return bool - True if email sent successfully
 */
function sendContactEmail($name, $email, $phone, $subject, $message) {
    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    // Prepare email content
    $to = COMPANY_EMAIL;
    $full_subject = "New Contact Form Submission: " . $subject;
    
    $email_body = "
    <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                .container { max-width: 600px; margin: 0 auto; }
                .header { background-color: #2c5f2d; color: white; padding: 20px; }
                .content { padding: 20px; background-color: #f4f4f4; }
                .field { margin: 15px 0; }
                .label { font-weight: bold; color: #2c5f2d; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>" . COMPANY_NAME . " - New Contact Form Submission</h2>
                </div>
                <div class='content'>
                    <div class='field'>
                        <span class='label'>Name:</span><br>" . htmlspecialchars($name) . "
                    </div>
                    <div class='field'>
                        <span class='label'>Email:</span><br>" . htmlspecialchars($email) . "
                    </div>
                    <div class='field'>
                        <span class='label'>Phone:</span><br>" . htmlspecialchars($phone) . "
                    </div>
                    <div class='field'>
                        <span class='label'>Subject:</span><br>" . htmlspecialchars($subject) . "
                    </div>
                    <div class='field'>
                        <span class='label'>Message:</span><br>" . nl2br(htmlspecialchars($message)) . "
                    </div>
                    <hr>
                    <p style='font-size: 12px; color: #666;'>
                        This email was sent from the contact form on " . COMPANY_NAME . " website.
                    </p>
                </div>
            </div>
        </body>
    </html>
    ";

    // Set email headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Send email
    $mail_sent = mail($to, $full_subject, $email_body, $headers);

    if ($mail_sent) {
        // Optional: Send auto-reply to visitor
        sendAutoReply($email, $name);
        return true;
    }

    return false;
}

/**
 * Send Auto-Reply Email to Visitor
 * @param string $email - Visitor email
 * @param string $name - Visitor name
 */
function sendAutoReply($email, $name) {
    $subject = "Thank you for contacting " . COMPANY_NAME;
    
    $message = "
    <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                .container { max-width: 600px; margin: 0 auto; }
                .header { background-color: #2c5f2d; color: white; padding: 20px; }
                .content { padding: 20px; background-color: #f4f4f4; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>" . COMPANY_NAME . "</h2>
                </div>
                <div class='content'>
                    <p>Hi " . htmlspecialchars($name) . ",</p>
                    <p>Thank you for contacting us! We have received your message and will get back to you as soon as possible.</p>
                    <p>We appreciate your interest in " . COMPANY_NAME . ".</p>
                    <p style='margin-top: 20px;'>
                        <strong>Contact Information:</strong><br>
                        Phone: " . COMPANY_PHONE_1 . " / " . COMPANY_PHONE_2 . "<br>
                        Email: " . COMPANY_EMAIL . "<br>
                        Hours: Monday - Sunday, 7 AM - 6 PM
                    </p>
                    <p style='color: #666; font-size: 12px; margin-top: 20px;'>
                        This is an automated response. Please do not reply to this email.
                    </p>
                </div>
            </div>
        </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: " . COMPANY_EMAIL . "\r\n";

    mail($email, $subject, $message, $headers);
}

/**
 * Log Contact Form Submission (Optional)
 * @param array $data - Form data
 */
function logContactSubmission($data) {
    $log_file = __DIR__ . '/logs/contact-submissions.log';
    
    // Create logs directory if it doesn't exist
    if (!is_dir(dirname($log_file))) {
        mkdir(dirname($log_file), 0777, true);
    }

    $log_entry = date('Y-m-d H:i:s') . " | Name: " . $data['name'] . " | Email: " . $data['email'] . " | Subject: " . $data['subject'] . "\n";
    file_put_contents($log_file, $log_entry, FILE_APPEND);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Validate required fields
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Log submission
        logContactSubmission([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message
        ]);

        // Attempt to send email
        if (sendContactEmail($name, $email, $phone, $subject, $message)) {
            $response = array(
                'success' => true,
                'message' => 'Message sent successfully! We will contact you soon.'
            );
        } else {
            $response = array(
                'success' => true,
                'message' => 'Thank you for your message. We will contact you soon.'
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    } else {
        $response = array(
            'success' => false,
            'message' => 'Please fill in all required fields.'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}
?>
