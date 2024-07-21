<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practise";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $role = mysqli_real_escape_string($conn, $_POST["role"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    // Validation (Check if all fields are filled)
    if (empty($name) || empty($role) || empty($email)) {
        echo "<div class='alert alert-danger' role='alert'>Please fill in all required fields.</div>";
    } else {
        // Prepare and execute the SQL INSERT statement
        $sql = "INSERT INTO records (name, role, email) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $role, $email);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success' role='alert'>New record added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error adding record: " . $conn->error . "</div>";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>New Record</h2>
        <form method="post">
            <div class="row mb-3">
                <label for="name" class="col-sm-3 col-form-label">Name:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="role" class="col-sm-3 col-form-label">Role:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="role" name="role" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/practise/records.php" role="button">Cancel</a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-3 offset-sm-3 d-grid">
                    <a class="btn btn-primary" href="/practise/practise.php" role="button">LeaveApproval</a>
                </div>
            </div>

        </form>
    </div>
</body>
</html>
