<?php
// Replace these variables with your actual database credentials
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ecommerce";

// Create a database connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT name, price FROM cart_items";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    echo "<h2>Shopping Cart</h2>";
    echo "<ul>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['name']} - ${$row['price']}</li>";
    }

    echo "</ul>";
} else {
    echo "<p>Your shopping cart is empty.</p>";
}

// Close the database connection
$conn->close();
?>
