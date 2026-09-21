<?php
// Lesson 4: INSERT
// mysqli_connect() opens a connection to a MySQL server or database.
$conn = mysqli_connect("localhost", "root", "", "database_1");
if (!$conn) {
    // die() stops execution and displays an error when the program cannot continue.
    // mysqli_connect_error() returns the latest connection error message.
    die("Connection failed: " . mysqli_connect_error());
}
$name = "Person1";
$email = "person1@example.com";
// $name = "Person2";
// $email = "person2@example.com";
// $name = "Person3";
// $email = "person3@example.com";

$sql = "INSERT INTO employees (name, email) VALUES ('$name', '$email')";

// mysqli_query() sends a SQL query that does not need bound user values.
if (mysqli_query($conn, $sql)) {
    echo "Employee added successfully.";
} else {
    // mysqli_error() returns the latest error for a connection.
    echo "Insert failed: " . mysqli_error($conn);
}
// mysqli_close() closes the MySQL connection.
mysqli_close($conn);
?>