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
$hours = $_POST['hours'];
$role = $_POST['role'];
$leave = $_POST['leave'];
$prior = $_POST['prior'];
$project = $_POST['project'];

// Prepare and execute the SQL query
$sql = "INSERT INTO employee (name, hours, role, leave, prior, project) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $hours, $role, $leave, $prior, $project);

if ($stmt->execute()) {
    echo "New user created successfully!";
    header("Location: login.php"); // Redirect to login page after successful signup
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
