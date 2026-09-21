<?php
// Lesson 2: Database connection
// mysqli_connect() opens a connection to a MySQL server or database.
$conn = mysqli_connect("localhost", "root", "", "database_1");
if (!$conn) {
    // die() stops execution and displays an error when the program cannot continue.
    // mysqli_connect_error() returns the latest connection error message.
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected to database_1 successfully.";
// mysqli_close() closes the MySQL connection.
mysqli_close($conn);
?>