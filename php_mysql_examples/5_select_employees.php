<?php
// Lesson 5: SELECT
// mysqli_connect() opens a connection to a MySQL server or database.
$conn = mysqli_connect("localhost", "root", "", "database_1");
if (!$conn) {
    // die() stops execution and displays an error when the program cannot continue.
    // mysqli_connect_error() returns the latest connection error message.
    die("Connection failed: " . mysqli_connect_error());
}
// mysqli_query() sends a SQL query that does not need bound user values.
$result = mysqli_query($conn, "SELECT id, name, email FROM employees ORDER BY id");

// mysqli_num_rows() counts rows in a result set.
if ($result && mysqli_num_rows($result) > 0) {
    // mysqli_fetch_assoc() gets the next result row as an associative array.
    while ($row = mysqli_fetch_assoc($result)) {
        
        // print_r($row); // print_r() displays the contents of an array for debugging purposes.
        // echo "<br>";
        
        echo $row["id"] . " - " . $row["name"] . " - " . $row["email"] . "<br>";
    }
} else {
    echo "No employees found.";
}
// mysqli_free_result() releases a result set.
mysqli_free_result($result);
// mysqli_close() closes the MySQL connection.
mysqli_close($conn);
?>