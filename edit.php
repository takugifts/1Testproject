<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Edit Record</h2>

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

        // Get the ID of the record to be edited
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        // If the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = mysqli_real_escape_string($conn, $_POST["name"]);
            $role = mysqli_real_escape_string($conn, $_POST["role"]);
            $email = mysqli_real_escape_string($conn, $_POST["email"]);

            // Prepare and execute the UPDATE statement
            $sql = "UPDATE records SET name = ?, role = ?, email = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $name, $role, $email, $id);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success' role='alert'>Record updated successfully!</div>";
                header("Refresh:2; url=records.php"); // Redirect after 2 seconds
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error updating record: " . $conn->error . "</div>";
            }

            $stmt->close();
        } else { // If the form is not submitted, retrieve the record data
            $sql = "SELECT * FROM records WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            // Retrieving the data from the database
            $name = $row['name'];
            $role = $row['role'];
            $email = $row['email'];

            $stmt->close();
        }

        $conn->close();
        ?>

        <form method="post">
            <div class="row mb-3">
                <label for="name" class="col-sm-3 col-form-label">Name:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="role" class="col-sm-3 col-form-label">Role:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="role" name="role" value="<?php echo $role; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/practise/records.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>