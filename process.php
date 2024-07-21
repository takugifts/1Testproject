<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practise";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Validate input (e.g., email format)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Insert data into database
        $sql = "INSERT INTO users (name, email, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            // Email sending section
            $to = "recipient@example.com"; 
            $subject = "New Message from Your Website";
            $body = "Name: $name\nEmail: $email\nMessage:\n$message";

            // Include PHPMailer libraries 
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';
            require 'PHPMailer/Exception.php';

            // Create a new PHPMailer instance
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0; // Enable verbose debug output (0 = off)
                $mail->isSMTP(); 
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'your_gmail_username'; // SMTP username
                $mail->Password = 'your_gmail_password'; // SMTP password
                $mail->SMTPSecure = 'tls'; // Enable TLS encryption; ssl also accepted
                $mail->Port = 587; // TCP port to connect to

                //Recipients
                $mail->setFrom('your_gmail_username', 'Your Name');
                $mail->addAddress($to, 'Recipient Name');

                // Content
                $mail->isHTML(false); // Set email format to plain text
                $mail->Subject = $subject;
                $mail->Body = $body;

                $mail->send();
                echo "Email sent successfully!";
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        } else {
            echo "Error inserting data: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Invalid email address.";
    }
}

$conn->close();