<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = "localhost"; 
$username = "u151986272_tbl";
$password = "Tbl@13124";
$database = "u151986272_tbl";

// Create a MySQL connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set parameters from the form data
$product_name = $_POST['product_name'];
$description = $_POST['description'];

// Sanitize the product name to create a valid directory name
$sanitized_product_name = preg_replace("/[^a-zA-Z0-9]+/", "-", $product_name);

// Define the base directory path
$base_dir = "images/image/" . $sanitized_product_name . "/image/";

// Check if the directory exists, if not create it
if (!file_exists($base_dir)) {
    mkdir($base_dir, 0777, true); // Set the permission as 0777 (read, write, execute)
}

// Handle file uploads
$main_image_path = handleFileUpload($_FILES['main_image'], $base_dir, 'main');
$main_image_path2 = handleFileUpload($_FILES['main_image2'], $base_dir, 'main2');
$main_image_path3 = handleFileUpload($_FILES['main_image3'], $base_dir, 'main3');
$main_image_path4 = handleFileUpload($_FILES['main_image4'], $base_dir, 'main4');
$sub_image_path = handleFileUpload($_FILES['sub_image'], $base_dir, 'sub');

// Prepare an INSERT statement
$stmt = $conn->prepare("INSERT INTO main_product (product_name, description, main_image_url, main_image_url2, main_image_url3, main_image_url4, sub_image_url) VALUES (?, ?, ?, ?, ?, ?, ?)");

// Bind the parameters
$stmt->bind_param("sssssss", $product_name, $description, $main_image_path, $main_image_path2, $main_image_path3, $main_image_path4, $sub_image_path);

// Execute the statement
$stmt->execute();

echo "New product added successfully. Redirecting in 3 seconds...";

// Close statement and connection
$stmt->close();
$conn->close();

echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 3000);</script>";

// Function to handle file upload
function handleFileUpload($file, $directory, $prefix) {
    $target_file = $directory . basename($file["name"]);
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Create a unique file name to prevent overwriting
    $newFileName = $directory . $prefix . "_" . uniqid() . '.' . $fileType;
    if (move_uploaded_file($file["tmp_name"], $newFileName)) {
        return $newFileName;
    } else {
        echo "Error uploading file: " . $file["name"];
        return null;
    }
}
?>
