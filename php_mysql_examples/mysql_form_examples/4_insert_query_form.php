<?php
$conn = mysqli_connect("localhost", "root", "", "database_1");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];

    $result = mysqli_query($conn, "INSERT INTO employees (name, email) VALUES ('$name', '$email')");

    if ($result) {
        echo "Employee added successfully.";
    } else {
        echo "Employee not added.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Employee</title>
</head>

<body>

    <h2>Add Employee</h2>

    <form method="POST">
        Name: <input type="text" name="name" required><br><br>

        Email:<input type="email" name="email" required><br><br>

        <button type="submit" name="submit">Add Employee</button>
    </form>

    <p><a href="5_select_employees_form.php">View Employees</a></p>

</body>

</html>

<?php
mysqli_close($conn);
?>