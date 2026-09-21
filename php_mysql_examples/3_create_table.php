    <?php
// Lesson 3: Create table
// mysqli_connect() opens a connection to a MySQL server or database.
$conn = mysqli_connect("localhost", "root", "", "database_1");
if (!$conn) {
    // die() stops execution and displays an error when the program cannot continue.
    // mysqli_connect_error() returns the latest connection error message.
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
// mysqli_query() sends a SQL query that does not need bound user values.
if (mysqli_query($conn, $sql)) {
    echo "employees table is ready.";
} else {
    // mysqli_error() returns the latest error for a connection.
    echo "Table creation failed: " . mysqli_error($conn);
}
// mysqli_close() closes the MySQL connection.
mysqli_close($conn);
?>