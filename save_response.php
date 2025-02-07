<?php
$servername = "localhost";
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "responses_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get response from AJAX
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = $_POST['response'];

    // Prevent SQL injection
    $response = $conn->real_escape_string($response);

    $sql = "INSERT INTO user_responses (response) VALUES ('$response')";

    if ($conn->query($sql) === TRUE) {
        echo "Response saved successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
