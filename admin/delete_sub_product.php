<?php
session_start(); // Start the session

// Check if the user is logged in, otherwise redirect to the login page
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

// Check if the product ID is set in the URL from a GET request
if (isset($_GET['id'])) {
    // Database connection variables
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

    // SQL to delete a record
    $sql = "DELETE FROM product_detail WHERE id = ?";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Set parameters and execute
    $id = $_GET['id'];
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // If the delete was successful, redirect to a success page or with a success message
        header("Location: index.php?message=Sub+product+deleted+successfully");
    } else {
        // If the delete failed, redirect with an error message
        header("Location: index.php?error=Error+deleting+sub+product");
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the ID isn't set, redirect back to the product list with an error message
    header("Location: index.php?error=Invalid+Sub+Product+ID");
}
?>
