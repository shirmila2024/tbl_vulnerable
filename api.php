<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $userEmail = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['massage'];

    // Your Gmail address
    $to = "test@tbl.devlk.com";

    // Email headers
    $headers = "From: $name <$userEmail>\r\n";
    $headers .= "Reply-To: $userEmail\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email to your Gmail address
    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully, redirect to index.php with success message
        header("Location: contact-us.php?message=success");
        exit;
    } else {
        // Email sending failed, redirect to index.php with error message
        header("Location: contact-us.php?message=error");
        exit;
    }
}
?>
