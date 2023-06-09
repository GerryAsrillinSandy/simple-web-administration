<?php
// Retrieve the username and password from the request
$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'];
$password = $data['password'];

// Perform database validation - this is just a simple example
$servername = "localhost";
$dbname = "your_database_name";
$dbusername = "your_database_username";
$dbpassword = "your_database_password";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $response = array('success' => true);
} else {
  $response = array('success' => false);
}

$conn->close();

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
