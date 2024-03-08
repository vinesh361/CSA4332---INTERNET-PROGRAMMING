<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Define your database connection details
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ecommerce";
// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }

// Process form data
$username = $_POST["username"];
$password = $_POST["password"];

// Check if username already exists
$check = "SELECT * FROM login WHERE username='$username' and password='$password' ";
$result = $conn->query($check);
if ($result->num_rows > 0) { 
  echo "Access Approved";
  header("Location:button.html");
  exit;
 } else {
echo "Invalid Access ";
 }

// Close connection
 $conn->close();
}
?>