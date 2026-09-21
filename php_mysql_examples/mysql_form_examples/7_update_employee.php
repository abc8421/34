<?php
$conn = mysqli_connect("localhost", "root", "", "database_1");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {

    $id = $_POST["id"];
    $email = $_POST["email"];

    $result = mysqli_query($conn, "UPDATE employees SET email = '$email' WHERE id = '$id'");

    if ($result) {
        echo "Employee updated successfully.";
    } else {
        echo "Employee not updated.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Employee</title>
</head>

<body>

    <h2>Update Employee Email</h2>

    <form method="POST">

        Employee ID:
        <input type="number" name="id" required>
        <br><br>

        New Email:
        <input type="email" name="email" required>
        <br><br>

        <button type="submit" name="submit">Update Employee</button>

    </form>

    <p><a href="5.php">View Employees</a></p>

</body>

</html>

<?php
mysqli_close($conn);
?>