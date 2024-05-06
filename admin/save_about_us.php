<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);
// Start the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $about1 = $_POST['about1'];
    $about2 = $_POST['about2'];

    // Prepare an insert statement
    $sql = "INSERT INTO about_us (about_us, about_us_2) VALUES (?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $param_about1, $param_about2);

        // Set parameters
        $param_about1 = $about1;
        $param_about2 = $about2;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to some page, maybe the same with a success message
            header("Location: index.php?message=About Us Updated Successfully");
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}

// Close connection
mysqli_close($link);
?>
