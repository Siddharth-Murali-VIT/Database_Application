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



// Get the search keyword from the form

$search = $_POST['search'];



// Prepare the SQL query to search for records

$sql = "SELECT * FROM users WHERE username LIKE '%$search%'";



$result = $conn->query($sql);



// Display the search results

if ($result->num_rows > 0) {

    echo "<table>";

    echo "<tr><th>Username</th><th>Password</th><th>Marks</th></tr>";

    while ($row = $result->fetch_assoc()) {

        echo "<tr><td>".$row['username']."</td><td>".$row['password']."</td><td>".$row['marks']."</td></tr>";

    }

    echo "</table>";

} else {

    echo "No results found.";

}



// Close the database connection

$conn->close();

?>

