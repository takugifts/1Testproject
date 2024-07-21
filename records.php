<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff; /* Blue */
            color: #fff;
        }

        .btn-success {
            background-color: #28a745; /* Green */
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545; /* Red */
            color: #fff;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>Employee Records</h2>
        <a class="btn btn-primary" href="/practise/manage.php?" role="button">Manage Records</a>
        <br>
        <table class="table table-striped table-hover">  
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>role</th>
                    <th>email</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
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

                // Read all rows from database table
                $sql = "SELECT * FROM records";
                $result = $conn->query($sql);  

                if (!$result) {
                    die("Invalid query: " . $conn->error); 
                }

                // Read data of each row
                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['role']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <a class='btn btn-success btn-sm' href='/practise/edit.php?id={$row['id']}' >Edit</a>  
                            <a class='btn btn-danger btn-sm' href='/practise/delete.php?id={$row['id']}' >Delete</a> 
                        </td>
                    </tr>
                    ";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>