<?php
// Database connection
$servername = "localhost";
$username = "gitpod";
$password = "gitpod";
$dbname = "demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert a record
$sql = "INSERT INTO users (name, email) VALUES ('Ravisha', 'ravisha@example.com')";
if ($conn->query($sql) === TRUE) {
    echo "✅ New record created successfully<br>";
} else {
    echo "❌ Error: " . $conn->error . "<br>";
}

// Fetch all records
$result = $conn->query("SELECT * FROM users");
if ($result->num_rows > 0) {
    echo "<h3>Users:</h3><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["id"] . " - " . $row["name"] . " (" . $row["email"] . ")</li>";
    }
    echo "</ul>";
} else {
    echo "No users found.";
}

$conn->close();
?>
