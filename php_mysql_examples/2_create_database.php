<?php

// Code 2: CREATE DATABASE prepares a separate place for application data.
// mysqli_connect() opens a connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
        // mysqli_connect_error() explains why the connection could not be opened.
        die("Connection failed: " . mysqli_connect_error());
}

// mysqli_query() sends this CREATE DATABASE SQL command to MySQL.
if (mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS database_1")) {
        echo "database_1 is ready.";
} else {
        // mysqli_error() returns the error produced by the failed query.
        echo "Database creation failed: " . mysqli_error($conn);
}

// mysqli_close() releases the connection after the lesson is complete.
mysqli_close($conn);

?>