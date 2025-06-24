<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// MySQL database credentials
$servername = "localhost";   // Replace with your database server
$username = "root";          // Default MySQL username
$password = "Grace@12345";              // Default password for root is empty in XAMPP, else set your password here
$dbname = "photography_db";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data from POST request
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $sessionType = isset($_POST['sessionType']) ? $_POST['sessionType'] : '';
    $package = isset($_POST['package']) ? $_POST['package'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';

    // Debugging: Check if the form data is being sent correctly
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // Check if any required field is missing
    if (empty($name) || empty($email) || empty($phone) || empty($sessionType) || empty($package) || empty($date)) {
        echo "Please fill in all the fields.";
    } else {
        // Prepare SQL query to insert data into the database
        $sql = "INSERT INTO registrations (name, email, phone, session_type, package, date)
                VALUES ('$name', '$email', '$phone', '$sessionType', '$package', '$date')";

        // Check if the query was successful
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
