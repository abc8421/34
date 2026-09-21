<?php
// Lesson 8: DELETE
// mysqli_connect() opens a connection to a MySQL server or database.
$conn = mysqli_connect("localhost", "root", "", "database_1");
if (!$conn) {
    // die() stops execution and displays an error when the program cannot continue.
    // mysqli_connect_error() returns the latest connection error message.
    die("Connection failed: " . mysqli_connect_error());
}
$id = 4;
$sql = "DELETE FROM employees WHERE id = $id";
// mysqli_query() sends a SQL query that does not need bound user values.
if (mysqli_query($conn, $sql)) {
    echo "Employee deleted successfully.";
} else {
    // mysqli_error() returns the latest error for a connection.
    echo "Delete failed: " . mysqli_error($conn);
}
// mysqli_close() closes the MySQL connection.
mysqli_close($conn);
?>