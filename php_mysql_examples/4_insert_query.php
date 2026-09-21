<?php
// Lesson 4: INSERT

// mysqli_connect() opens a connection to a MySQL server or database.
$conn = mysqli_connect("localhost", "root", "", "database_1");

if (!$conn) {
    // die() stops execution and displays an error when the program cannot continue.
    // mysqli_connect_error() returns the latest connection error message.
    die("Connection failed: " . mysqli_connect_error());
}

$name = "Person5";
$email = "person5@example.com";

// mysqli_prepare() creates a SQL statement with ? placeholders.
$statement = mysqli_prepare($conn, "INSERT INTO employees (name, email) VALUES (?, ?)");

// mysqli_stmt_bind_param() attaches values to the ? placeholders.
// "ss" means both values are strings.
mysqli_stmt_bind_param($statement, "ss", $name, $email);

// mysqli_stmt_execute() executes the prepared SQL statement.
if (mysqli_stmt_execute($statement)) {
    echo "Employee added successfully.";
} else {
    // mysqli_error() returns the latest error for a connection.
    echo "Insert failed: " . mysqli_error($conn);
}

// mysqli_close() closes the MySQL connection.
mysqli_close($conn);
?>