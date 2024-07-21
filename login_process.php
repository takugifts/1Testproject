<?php
session_start();

include("php/config.php");

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $result = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password'") or die("Select error");
    $row = mysqli_fetch_assoc($result);

    if(is_array($row) && !empty($row)){
        $_SESSION['valid'] = $row['Email'];
        $_SESSION['username'] = $row['Username'];
        $_SESSION['id'] = $row['Id'];
        header("Location: employee.php");
    } else {
        echo "<div class='message'>
        <p>Wrong Email or Password</p>
        </div><br>";
        echo "<a href='index.php'><button class='btn'>Try Again</button>";
    }
}

