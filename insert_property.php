<?php
session_start(); // Start the session

$host = "localhost";
$user = "kjones258"; // replace with your MySQL username
$pass = "kjones258"; // replace with your MySQL password
$dbname = "kjones258"; // replace with your database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else{
    echo "Username not set.";
    exit();
}

// Retrieve data from the form
$location = $_POST['location'];
$age = $_POST['age'];
$squareFootage = $_POST['squareFootage'];
$bedrooms = $_POST['bedrooms'];
$bathrooms = $_POST['bathrooms'];
$hasGarden = isset($_POST['hasGarden']) ? 1 : 0; // Check if checkbox is checked
$parkingCapacity = $_POST['parkingCapacity'];
$propertyPrice = $_POST['propertyPrice'];

// SQL to insert data into the Properties table with user ID
$sql = "INSERT INTO Properties (userID, location, age, squareFootage, bedrooms, bathrooms, hasGarden, parkingCapacity, propertyPrice)
        VALUES ('$username', '$location', $age, $squareFootage, $bedrooms, $bathrooms, $hasGarden, $parkingCapacity, $propertyPrice)";

if ($conn->query($sql) === TRUE) {
    echo "Property added successfully";
} else {
    echo "Error adding property: " . $conn->error;
}

$conn->close();
?>
