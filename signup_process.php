<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$surname = $_POST['surname'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
$idnumber = $_POST['idnumber'];
$address = $_POST['address'];
$email = $_POST['email'];

// Hash the password for security
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute the SQL query
$sql = "INSERT INTO users (name, surname, username, password, role, idnumber, address, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $name, $surname, $username, $hashedPassword, $role, $idnumber, $address, $email);

if ($stmt->execute()) {
    echo "New user created successfully!";
    header("Location: login.php"); // Redirect to login page after successful signup
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
