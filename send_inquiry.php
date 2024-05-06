<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];

    // Email address to send the inquiry
    $to = 'test@tbl.devlk.com';
    $subject = 'Product Inquiry';
    $message = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message\nPhone: $phone\nCompany: $company";
    $headers = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo 'Your inquiry has been submitted successfully.';
    } else {
        echo 'There was a problem submitting your inquiry. Please try again later.';
    }
}
?>
