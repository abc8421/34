<?php
$conn = mysqli_connect("localhost", "root", "", "database_1");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {

    $id = $_POST["id"];

    $result = mysqli_query($conn,"DELETE FROM employees WHERE id = '$id'");

    if ($result) {
        echo "Employee deleted successfully.";
    } else {
        echo "Employee not deleted.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Delete Employee</title>
</head>

<body>

    <h2>Delete Employee</h2>

    <form method="POST">

        Employee ID:
        <input type="number" name="id" required>
        <br><br>

        <button type="submit" name="submit">Delete Employee</button>

    </form>

    <p><a href="5.php">View Employees</a></p>

</body>

</html>

<?php
mysqli_close($conn);
?>