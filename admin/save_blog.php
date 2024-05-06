<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

// Database connection variables
$host = "localhost";
$dbname = "u151986272_tbl";
$username = "u151986272_tbl";
$password = "Tbl@13124";

// Create PDO instance for DB connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["blog_image"]) && $_FILES["blog_image"]["error"] == 0) {
        $allowed = ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png",
    "webp" => "image/webp"];
        $filename = $_FILES["blog_image"]["name"];
        $filetype = $_FILES["blog_image"]["type"];
        $filesize = $_FILES["blog_image"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            $unique_id = uniqid(); // Generate a unique ID for the blog
            $new_filename = "../blogs/$unique_id/$filename";
            if (!file_exists($new_filename)) {
                // Create directory if it does not exist
                if (!is_dir("../blogs/$unique_id/")) {
                    mkdir("../blogs/$unique_id/", 0777, true);
                }
                // Move the file
                move_uploaded_file($_FILES["blog_image"]["tmp_name"], $new_filename);
                echo "Your file was uploaded successfully.";
                
                // Prepare an insert statement
                $sql = "INSERT INTO blog (image_url, topic, content, date) VALUES (:image_url, :topic, :content, :date)";
                
                if ($stmt = $pdo->prepare($sql)) {
                    // Bind variables to the prepared statement as parameters
                    $stmt->bindParam(':image_url', $param_image_url, PDO::PARAM_STR);
                    $stmt->bindParam(':topic', $param_topic, PDO::PARAM_STR);
                    $stmt->bindParam(':content', $param_content, PDO::PARAM_STR);
                    $stmt->bindParam(':date', $param_date, PDO::PARAM_STR);
                    
                    // Set parameters
                    $param_image_url = "blogs/$unique_id/$filename";
                    $param_topic = $_POST['blog_topic'];
                    $param_content = $_POST['blog_content'];
                    $param_date = $_POST['blog_date'];
                    
                    // Attempt to execute the prepared statement
                    if ($stmt->execute()) {
                        header("Location: index.php?message=Blog Inserted Successfully");
                    } else {
                        echo "Error: Could not execute the query: $sql. " . $pdo->error;
                    }
                }
                
            } else {
                echo "Error: File already exists.";
            } 
        } else {
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else {
        echo "Error: " . $_FILES["blog_image"]["error"];
    }
}

// Close connection
unset($pdo);
?>
