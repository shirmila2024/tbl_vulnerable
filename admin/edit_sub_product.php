<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $id = $conn->real_escape_string($_POST['id']);
    $product_id = $conn->real_escape_string($_POST['product_id']);
    $header_id = $conn->real_escape_string($_POST['header_id']);
    $field_1 = $conn->real_escape_string($_POST['field_1']);
    $field_2 = $conn->real_escape_string($_POST['field_2']);
    $field_3 = $conn->real_escape_string($_POST['field_3']);
    $field_4 = $conn->real_escape_string($_POST['field_4']);
    $field_5 = $conn->real_escape_string($_POST['field_5']);
    $field_6 = $conn->real_escape_string($_POST['field_6']);
    $field_7 = $conn->real_escape_string($_POST['field_7']);
    $field_8 = $conn->real_escape_string($_POST['field_8']);
    $field_9 = $conn->real_escape_string($_POST['field_9']);
    $field_10 = $conn->real_escape_string($_POST['field_10']);
    $field_11 = $conn->real_escape_string($_POST['field_11']);
    $field_12 = $conn->real_escape_string($_POST['field_12']);

    // SQL UPDATE statement
    $sql = "UPDATE `product_detail` SET 
            `product_id`='$product_id', 
            `header_id`='$header_id', 
            `field_1`='$field_1', 
            `field_2`='$field_2', 
            `field_3`='$field_3', 
            `field_4`='$field_4', 
            `field_5`='$field_5', 
            `field_6`='$field_6', 
            `field_7`='$field_7', 
            `field_8`='$field_8', 
            `field_9`='$field_9',
            `field_10`='$field_10',
            `field_11`='$field_11',
            `field_12`='$field_12' 
            WHERE `id`='$id'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        // Redirect or display a success message
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
