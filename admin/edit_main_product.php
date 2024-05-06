<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Database configuration
$host = "localhost"; 
$username = "u151986272_tbl";
$password = "Tbl@13124";
$database = "u151986272_tbl";

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the update statement
$stmt = $conn->prepare("UPDATE `main_product` SET `product_name`=?, `description`=?, `pdf_link`=?, `main_image_url`=?, `sub_image_url`=? WHERE `id`=?");

// Bind parameters. Assuming 'pdf_link', 'main_image_url', and 'sub_image_url' are also submitted in the form
$stmt->bind_param("sssssi", $_POST['product_name'], $_POST['description'], $_POST['pdf_link'], $_POST['main_image_url'], $_POST['sub_image_url'], $_POST['id']);

// Execute the statement
if ($stmt->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();

// Redirect back to the main product list or show success message
header('Location: index.php?message=Main+product+updated+successfully');
?>
