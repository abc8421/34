<?php
$conn = mysqli_connect("localhost", "root", "", "database_1");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$result = mysqli_query($conn, "SELECT id, name, email FROM employees ORDER BY id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employees</title>
</head>

<body>
    <h1>Employees</h1>
    <p><a href="4_insert_prepared_form.php">Add employee</a></p>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        ?>
        <table border="1" cellpadding="6">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo (int) $row["id"]; ?></td>
                    <td><?php echo htmlspecialchars($row["name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    } else {
        ?>
        <p>No employees found.</p>
        <?php
    }
    ?>
</body>

</html>
<?php
if ($result) {
    mysqli_free_result($result);
}
mysqli_close($conn);
?>