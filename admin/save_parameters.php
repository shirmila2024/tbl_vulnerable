<?php
// Enable error reporting for debugging - remove this line in production
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('localhost', 'u151986272_tbl', 'Tbl@13124', 'u151986272_tbl');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   $values = [];
for ($i = 1; $i <= 12; $i++) {
    // Prepare a safe value to insert into the database, use an empty string as default if field is not set
    $fieldValue = isset($_POST["field_$i"]) ? $_POST["field_$i"] : '';
    $values[] = "'" . $conn->real_escape_string($fieldValue) . "'";
}

$sql = "INSERT INTO head (field_1, field_2, field_3, field_4, field_5, field_6, field_7, field_8, field_9, field_10, field_11, field_12)
        VALUES (" . implode(", ", $values) . ")
        ON DUPLICATE KEY UPDATE
        field_1 = VALUES(field_1), field_2 = VALUES(field_2), field_3 = VALUES(field_3), field_4 = VALUES(field_4), 
        field_5 = VALUES(field_5), field_6 = VALUES(field_6), field_7 = VALUES(field_7), field_8 = VALUES(field_8), 
        field_9 = VALUES(field_9), field_10 = VALUES(field_10), field_11 = VALUES(field_11), field_12 = VALUES(field_12);";

    if ($conn->query($sql) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php?success"); // Redirect after saving
}
?>
