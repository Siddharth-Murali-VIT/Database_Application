<?php

// Set your database credentials

$servername = "siddharth-VirtualBox";

$username = "root";

$password = "Sidd-0907";

$dbname = "dbms_app";



// Create a connection to the database

$conn = new mysqli($servername, $username, $password, $dbname);



// Check the connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}



// Calculate the class average

$sql = "SELECT AVG(marks) AS class_average FROM users";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

$classAverage = $row['class_average'];



echo "Class Average: " . $classAverage;



// Close the database connection

$conn->close();

?>

