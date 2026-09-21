<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "database_1");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if (isset($_POST["submit"])) {
    // Get name from form
    $name = $_POST["name"];

    // Search employee using WHERE
    $result = mysqli_query($conn, "SELECT * FROM employees WHERE name = '$name'");

    // Check if employee exists
    if (mysqli_num_rows($result) > 0) {
        // Display employee details
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row["id"] . "<br>";
            echo "Name: " . $row["name"] . "<br>";
            echo "Email: " . $row["email"] . "<br><br>";
        }
    } else {
        echo "No matching employee found.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Search Employee</title>
</head>

<body>
    <h2>Search Employee</h2>

    <form method="POST">
        Enter Name:
        <input type="text" name="name" required>
        <button type="submit" name="submit">Search</button>
    </form>
</body>

</html>