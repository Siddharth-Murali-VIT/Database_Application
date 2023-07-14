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



// Get the submitted username, password, marks, and operation from the form

$username = $_POST['username'];

$password = $_POST['password'];

$marks = $_POST['marks'];

$operation = $_POST['operation'];



// Perform the DML operation based on the selected option

if ($operation === 'insert') {

    // Insert Operation

    $sql = "INSERT INTO users (username, password, marks) VALUES ('$username', '$password', '$marks')";

    if ($conn->query($sql) === TRUE) {

        echo "Record inserted successfully.";

    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

    }

} elseif ($operation === 'update') {

    // Update Operation

    $sql = "UPDATE users SET password='$password', marks='$marks' WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {

        echo "Record updated successfully.";

    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

    }

} elseif ($operation === 'delete') {

    // Delete Operation

    $sql = "DELETE FROM users WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {

        echo "Record deleted successfully.";

    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

    }

} else {

    // Invalid operation

    echo "Invalid operation.";

    $conn->close();

    exit;

}



// Close the database connection

$conn->close();

?>

