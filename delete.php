<?php
if (isset($_GET["id"]) ) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "practise";

    //create database
    $connection = new mysqli($$servername, $username, $password, $dbname);

    $sql = "DELETE FROM records WHERE id=$id";
    $connection->query($sql);
}

header("location: /practise/records.php");
exit;
  