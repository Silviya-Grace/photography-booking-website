<?php
// Database configuration
$servername = "localhost"; // Replace with your server's address
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "photography_booking"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $sessionType = $conn->real_escape_string($_POST['sessionType']);
    $package = $conn->real_escape_string($_POST['package']);
    $date = $conn->real_escape_string($_POST['date']);

    // Insert data into the database
    $sql = "INSERT INTO registrations (name, email, phone, session_type, package, date) 
            VALUES ('$name', '$email', '$phone', '$sessionType', '$package', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>Registration Successful!</h1>";
        echo "<p>Thank you, <strong>$name</strong>. Your session for <strong>$sessionType</strong> on <strong>$date</strong> has been registered successfully under the <strong>$package</strong>.</p>";
        echo "<a href='index.html'>Back to Home</a>";
    } else {
        echo "<h1>Error!</h1>";
        echo "<p>There was an issue with your registration. Please try again later.</p>";
        echo "Error details: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
