<?php
session_start(); // Start the session
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    $header_id = isset($_POST['header_id']) ? $_POST['header_id'] : '';
    $fields = [];
    for ($i = 1; $i <= 12; $i++) {
        // Prepare a safe value to insert into the database, use an empty string as default if field is not set
        $fields["field_$i"] = isset($_POST["field_$i"]) ? $_POST["field_$i"] : '';
    }

    // Construct your SQL query to insert or update the data
    $sql = "INSERT INTO product_detail (product_id, header_id, field_1, field_2, field_3, field_4, field_5, field_6, field_7, field_8, field_9, field_10, field_11, field_12)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
            header_id = VALUES(header_id), field_1 = VALUES(field_1), field_2 = VALUES(field_2), field_3 = VALUES(field_3), field_4 = VALUES(field_4),
            field_5 = VALUES(field_5), field_6 = VALUES(field_6), field_7 = VALUES(field_7), field_8 = VALUES(field_8), 
            field_9 = VALUES(field_9), field_10 = VALUES(field_10), field_11 = VALUES(field_11), field_12 = VALUES(field_12);";

    // Prepare statement and bind variables
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iissssssssssss", $product_id, $header_id, $fields['field_1'], $fields['field_2'], $fields['field_3'], $fields['field_4'], $fields['field_5'], $fields['field_6'], $fields['field_7'], $fields['field_8'], $fields['field_9'], $fields['field_10'], $fields['field_11'], $fields['field_12']);
        $stmt->execute();
        $stmt->close();
        header("Location: index.php?success"); // Redirect after successful submission
    } else {
        // Error handling
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
