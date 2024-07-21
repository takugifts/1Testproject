<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            margin-top: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .back {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .back a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }
        .back a:hover {
            color: #0056b3;
        }
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical; /* Allow vertical resizing */
            height: 150px; /* Initial height */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Employee Information</h1>

    <form action="employee_process.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="hours">Working Hours (From - To):</label>
        <input type="text" id="hours" name="hours" required> 
        

        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="employee">Employee</option>
            <option value="manager">Manager</option>
            <!-- Add other roles as needed -->
        </select>

        <label for="leave">Leave Request:</label>
        <select id="leave" name="leave" required>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>

        <label for="prior">Had Leave Before:</label>
        <select id="prior" name="prior" required>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>

        <label for="project">Project introduced:</label>
        <textarea id="project" name="project" required></textarea>

        <input type="submit" value="Submit">
    </form>

    <div class="back">
        <a href="login.php">Back to Login</a>
    </div>
</div>

</body>
</html>