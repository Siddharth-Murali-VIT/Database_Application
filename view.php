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



$view = $_POST['view'];



if ($view === 'all') {

    // View All Records

    $sql = "SELECT * FROM users ORDER BY username ASC";

} elseif ($view === 'first') {

    // View First Record

    $sql = "SELECT * FROM users ORDER BY username ASC LIMIT 1";

} elseif ($view === 'last') {

    // View Last Record

    $sql = "SELECT * FROM users ORDER BY username DESC LIMIT 1";

} else {

    // Invalid view option

    echo "Invalid view option.";

    $conn->close();

    exit;

}



$result = $conn->query($sql);



// Display the records

if ($result->num_rows > 0) {

    echo "<table>";

    echo "<tr><th>Username</th><th>Password</th><th>Marks</th></tr>";

    while ($row = $result->fetch_assoc()) {

        echo "<tr><td>".$row['username']."</td><td>".$row['password']."</td><td>".$row['marks']."</td></tr>";

    }

    echo "</table>";

} else {

    echo "No records found.";

}



// Close the database connection

$conn->close();

?>

