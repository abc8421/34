<?php
// Lesson 1: MySQL introduction
// mysqli_connect() opens a connection to a MySQL server or database.
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
    // die() stops execution and displays an error when the program cannot continue.
    // mysqli_connect_error() returns the latest connection error message.
    die("Connection failed: " . mysqli_connect_error());
}
echo "MySQL server is connected.<br>";
// mysqli_close() closes the MySQL connection.
mysqli_close($conn);
?>