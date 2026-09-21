<?php
$conn = mysqli_connect("localhost", "root", "", "database_1");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");

    if ($name === "" || $email === "") {
        $message = "Please enter both a name and an email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please enter a valid email address.";
    } else {
        $statement = mysqli_prepare($conn, "INSERT INTO employees (name, email) VALUES (?, ?)");

        mysqli_stmt_bind_param($statement, "ss", $name, $email);

        $message = mysqli_stmt_execute($statement)
            ? "Employee added successfully."
            : "Insert failed: " . mysqli_error($conn);
        mysqli_stmt_close($statement);
    }
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add employee</title>
</head>

<body>

    <h1>Add employee</h1>

    <?php
    if ($message != "") {
        echo "<p>" . htmlspecialchars($message) . "</p>";
    }
    ?>

    <form method="post">
        <label>Name: <input type="text" name="name" required></label><br><br>
        <label>Email: <input type="email" name="email" required></label><br><br>
        <button type="submit">Add employee</button>
    </form>

    <p><a href="5_select_employees_form.php">View employees</a></p>

    <?php
    mysqli_close($conn);
    ?>

</body>

</html>