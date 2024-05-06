<?php
// Database connection setup
$host = "localhost"; 
$username = "u151986272_tbl";
$password = "Tbl@13124";
$database = "u151986272_tbl";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header('Content-Type: application/json');

if (isset($_GET['header_id'])) {
    $headerId = $conn->real_escape_string($_GET['header_id']);
    $sql = "SELECT `field_1`, `field_2`, `field_3`, `field_4`, `field_5`, `field_6`, `field_7`, `field_8`, `field_9`, `field_10`, `field_11`, `field_12` FROM `head` WHERE id = '$headerId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode([]);
    }
}

$conn->close();
?>
