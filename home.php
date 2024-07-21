<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Home Page</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            text-align: center;
            width: 100%;
        }

        .buttons {
            display: flex;
            gap: 20px;
            margin-top: 50px;
        }

        button {
            padding: 15px 30px;
            background-color: #4CAF50; /* Green */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049; /* Darker green */
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>TEST PROJECT</h1>
    </div>

    <div class="buttons">
        <button onclick="window.location.href='records.php'">Manager</button>
        <button onclick="window.location.href='employee.php'">Employee</button>
    </div>
</body>
</html>
