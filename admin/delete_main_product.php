<?php
session_start(); // Start the session

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

// Check if the product ID is set in the URL
if (isset($_GET['id'])) {
    // Database connection variables
    $host = "localhost";
    $username = "u151986272_tbl";
    $password = "Tbl@13124";
    $database = "u151986272_tbl";

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare a delete statement
    $stmt = $conn->prepare("DELETE FROM main_product WHERE id = ?");
    $stmt->bind_param("i", $productId);

    // Set parameters and execute
    $productId = $_GET['id'];
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // If the delete was successful, redirect with a success message
        header("Location: index.php?message=Product+deleted+successfully");
    } else {
        // If the delete failed, redirect with an error message
        header("Location: index.php?error=Error+deleting+product");
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the ID isn't set, redirect back to the product list
    header("Location: index.php?error=Invalid+Product+ID");
}
?>
