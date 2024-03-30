<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connection parameters
$host = "localhost";
$user = "vinodjew_sha"; // Updated MySQL user
$password = "ananthi@123"; // Updated MySQL password
$database = "vinodjew_sha"; // Updated MySQL database name

// Create connection
$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully<br>";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Retrieve form data
    $fullName = isset($_POST["full_name"]) ? $_POST["full_name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $message = isset($_POST["message"]) ? $_POST["message"] : "";

    // Prepare SQL statement
    $sql = "INSERT INTO myweb (name, email, message) VALUES (?, ?, ?)";
    
    // Bind parameters to prepared statement
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $message);

    // Execute statement
    if (mysqli_stmt_execute($stmt)) {
        $success_message = "Record inserted successfully";
        echo "<script>alert('$success_message');</script>";
    } else {
        $error_message = "Error inserting record: " . mysqli_error($con);
        error_log($error_message);
        echo "<script>alert('Failed to insert record. Please check error logs for more details.');</script>";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($con);
?>